<?php
namespace Project\Bootstrappers\Console\Commands;

use Opulence\Applications\Bootstrappers\Bootstrapper;
use Opulence\Console\Commands\CommandCollection;
use Opulence\Ioc\IContainer;

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
        $commandClasses = require "{$this->paths["configs.console"]}/commands.php";

        // Instantiate each command class
        foreach ($commandClasses as $commandClass) {
            $commandCollection->add($container->makeShared($commandClass));
        }
    }
}