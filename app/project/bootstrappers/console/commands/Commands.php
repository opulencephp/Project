<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the command bootstrapper
 */
namespace Project\Bootstrappers\Console\Commands;
use RDev\Console\Commands as ConsoleCommands;
use RDev\Applications\Bootstrappers;
use RDev\IoC;

class Commands extends Bootstrappers\Bootstrapper
{
    /**
     * Sets the console commands from this project
     *
     * @param ConsoleCommands\commands $commands The commands to add to
     * @param IoC\IContainer $container The dependency injection container
     */
    public function run(ConsoleCommands\Commands $commands, IoC\IContainer $container)
    {
        $commandClasses = require_once $this->paths["configs"] . "/console/commands.php";

        // Instantiate each command class
        foreach($commandClasses as $commandClass)
        {
            $commands->add($container->makeShared($commandClass));
        }
    }
}