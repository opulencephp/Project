<?php
/**
 * Defines the command bootstrapper
 */
namespace Project\Bootstrappers\Console\Commands;
use RDev\Applications\Bootstrappers\Bootstrapper;
use RDev\Console\Commands\CommandCollection;
use RDev\IoC\IContainer;

class Commands extends Bootstrapper
{
    /**
     * Sets the console commands from this project
     *
     * @param CommandCollection $commandCollection The commands to add to
     * @param IContainer $container The dependency injection container
     */
    public function run(CommandCollection $commandCollection, IContainer $container)
    {
        $commandClasses = require $this->paths["configs"] . "/console/commands.php";

        // Instantiate each command class
        foreach($commandClasses as $commandClass)
        {
            $commandCollection->add($container->makeShared($commandClass));
        }
    }
}