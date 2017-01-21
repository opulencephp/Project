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
     * Sets the console commands from this project
     *
     * @param CommandCollection $commandCollection The commands to add to
     * @param IContainer $container The dependency injection container
     */
    public function run(CommandCollection $commandCollection, IContainer $container)
    {
        $commandClasses = require Config::get('paths', 'config.console') . '/commands.php';

        try {
            // Instantiate each command class
            foreach ((array)$commandClasses as $commandClass) {
                $commandCollection->add($container->resolve($commandClass));
            }
        } catch (Exception $ex) {
            throw new RuntimeException('Failed to add console commands', 0, $ex);
        }
    }
}
