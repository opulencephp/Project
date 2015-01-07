<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Boots up our application with a console kernel
 */
use RDev\Console\Commands\Commands;
use RDev\Console\Commands\Compilers\ICompiler;
use RDev\Console\Requests\Parsers\IParser;
use RDev\Console\Kernels\Kernel;

require_once __DIR__ . "/../../vendor/autoload.php";
require_once __DIR__ . "/../../configs/php.php";

// Setup the application
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
require_once __DIR__ . "/../../configs/commands.php";

// Handle the input
$input = implode(" ", $argv);
(new Kernel($commandCompiler, $commands, $application->getLogger()))->handle($requestParser, $input);
$application->shutdown();