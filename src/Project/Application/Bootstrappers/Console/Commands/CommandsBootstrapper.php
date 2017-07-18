<?php
namespace Project\Application\Bootstrappers\Console\Commands;

use Exception;
use Opulence\Console\Commands\CommandCollection;
use Opulence\Framework\Configuration\Config;
use Opulence\Ioc\Bootstrappers\Bootstrapper;
use Opulence\Ioc\IContainer;
use RuntimeException;

/**
 * Defines the command bootstrapper
 */
class CommandsBootstrapper extends Bootstrapper
{
    /**
     * @inheritdoc
     */
    public function registerBindings(IContainer $container)
    {
        $commands = $container->resolve(CommandCollection::class);
        $commandClasses = require Config::get('paths', 'config.console') . '/commands.php';

        try {
            // Instantiate each command class
            foreach ((array)$commandClasses as $commandClass) {
                $commands->add($container->resolve($commandClass));
            }
        } catch (Exception $ex) {
            throw new RuntimeException('Failed to add console commands', 0, $ex);
        }
    }
}
