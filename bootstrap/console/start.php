<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Boots up our application with a console kernel
 */
use RDev\Applications\Application;
use RDev\Console\Commands\Commands;
use RDev\Console\Commands\Compilers\ICompiler;
use RDev\Console\Kernels\Kernel;
use RDev\Console\Requests\Parsers\IParser;

require_once __DIR__ . "/../../vendor/autoload.php";
require_once __DIR__ . "/../../configs/php.php";

// Setup the application
/** @var Application $application */
$application = require_once __DIR__ . "/../../configs/application.php";
$application->registerBootstrappers(require_once __DIR__ . "/../../configs/console/bootstrappers.php");
$application->start();

// Setup the commands
/** @var IParser $requestParser */
/** @var ICompiler $commandCompiler */
/** @var Commands $commands */
$requestParser = $application->getIoCContainer()->makeShared("RDev\\Console\\Requests\\Parsers\\IParser");
$commandCompiler = $application->getIoCContainer()->makeShared("RDev\\Console\\Commands\\Compilers\\ICompiler");
$commands = new Commands();
$commandClasses = require_once __DIR__ . "/../../configs/commands.php";

// Instantiate each command class
foreach($commandClasses as $commandClass)
{
    $commands->add($application->getIoCContainer()->makeShared($commandClass));
}

// Handle the input
(new Kernel($commandCompiler, $commands, $application->getLogger()))->handle($requestParser, $argv);
$application->shutdown();