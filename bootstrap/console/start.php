<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Boots up our application with a console kernel
 */
use RDev\Console\Commands\Commands;
use RDev\Console\Kernels\Kernel;

require_once __DIR__ . "/../../vendor/autoload.php";
require_once __DIR__ . "/../../configs/php.php";

// Setup the application
$application = require_once __DIR__ . "/../../configs/application.php";
$application->start();

// Setup the commands
/** @var Commands $commands */
$commands = $application->getIoCContainer()->makeShared("RDev\\Console\\Commands\\Commands");
require_once __DIR__ . "/../../configs/commands.php";

// Handle the input
(new Kernel($commands, $application->getLogger()))->handle();
$application->shutdown();