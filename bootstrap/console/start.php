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
 * ----------------------------------------------------------
 * Let's get started
 * ----------------------------------------------------------
 */
$application->registerBootstrappers(require_once $application->getPaths()["configs"] . "/console/bootstrappers.php");
$statusCode = $application->start(function () use ($application)
{
    global $argv;

    /**
     * ----------------------------------------------------------
     * Handle the request
     * ----------------------------------------------------------
     *
     * @var Commands $commands
     * @var IParser $requestParser
     * @var ICompiler $commandCompiler
     */
    $commands = $application->getIoCContainer()->makeShared("RDev\\Console\\Commands\\Commands");
    $requestParser = $application->getIoCContainer()->makeShared("RDev\\Console\\Requests\\Parsers\\IParser");
    $commandCompiler = $application->getIoCContainer()->makeShared("RDev\\Console\\Commands\\Compilers\\ICompiler");
    $kernel = new Kernel($requestParser, $commandCompiler, $commands, $application->getLogger(), $application->getVersion());

    return $kernel->handle($argv);
});

/**
 * ----------------------------------------------------------
 * Shut her down
 * ----------------------------------------------------------
 */
$application->shutdown();
exit($statusCode);