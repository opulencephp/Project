<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Boots up our application with a console kernel
 */
use RDev\Console\Commands\Commands;
use RDev\Console\Commands\Compilers\ICompiler;
use RDev\Console\Kernels\Kernel;
use RDev\Console\Requests\Parsers\IParser;

require_once __DIR__ . "/../start.php";

/**
 * ==========================================================
 * Let RDev do any setup that it needs to do
 * ==========================================================
 */
require_once $paths["vendor"] . "/rdev/rdev/app/rdev/framework/console/start.php";

/**
 * ==========================================================
 * Let's get started
 * ==========================================================
 */
$application->registerBootstrappers(require_once __DIR__ . "/../../configs/console/bootstrappers.php");
$application->start();

/**
 * ==========================================================
 * Setup the commands
 * ==========================================================
 */
/**
 * @var Commands $commands, @var IParser $requestParser
 * @var IParser $requestParser
 * @var ICompiler $commandCompiler
 */
$commands = $application->getIoCContainer()->makeShared("RDev\\Console\\Commands\\Commands");
$requestParser = $application->getIoCContainer()->makeShared("RDev\\Console\\Requests\\Parsers\\IParser");
$commandCompiler = $application->getIoCContainer()->makeShared("RDev\\Console\\Commands\\Compilers\\ICompiler");
$commandClasses = require_once __DIR__ . "/../../configs/commands.php";

// Instantiate each command class
foreach($commandClasses as $commandClass)
{
    $commands->add($application->getIoCContainer()->makeShared($commandClass));
}

/**
 * ==========================================================
 * Handle the input
 * ==========================================================
 */
$kernel = new Kernel($commandCompiler, $commands, $application->getLogger(), $application->getVersion());
$statusCode = $kernel->handle($requestParser, $argv);

/**
 * ==========================================================
 * Shut her down
 * ==========================================================
 */
$application->shutdown();
exit($statusCode);