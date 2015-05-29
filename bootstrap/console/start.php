<?php
/**
 * Boots up our application with a console kernel
 */
use RDev\Applications\Bootstrappers\IO\BootstrapperIO;
use RDev\Console\Commands\CommandCollection;
use RDev\Console\Commands\Compilers\ICompiler;
use RDev\Console\Requests\Parsers\IParser;
use RDev\Framework\Console\Kernel;

require_once __DIR__ . "/../start.php";

/**
 * ----------------------------------------------------------
 * Finish setting up the bootstrappers
 * ----------------------------------------------------------
 */
$bootstrapperIO->registerBootstrapperClasses(require $application->getPaths()["configs"] . "/console/bootstrappers.php");
$application->registerPreStartTask(function() use ($bootstrapperDispatcher, &$bootstrapperIO)
{
    $bootstrapperDispatcher->dispatch(
        $bootstrapperIO->read(BootstrapperIO::CACHED_CONSOLE_BOOTSTRAPPER_REGISTRY_FILE_NAME)
    );
});

/**
 * ----------------------------------------------------------
 * Let's get started
 * ----------------------------------------------------------
 */
$statusCode = $application->start(function () use ($application)
{
    global $argv;

    /**
     * ----------------------------------------------------------
     * Handle the request
     * ----------------------------------------------------------
     *
     * @var CommandCollection $commandCollection
     * @var IParser $requestParser
     * @var ICompiler $commandCompiler
     */
    $commandCollection = $application->getIoCContainer()->makeShared("RDev\\Console\\Commands\\CommandCollection");
    $requestParser = $application->getIoCContainer()->makeShared("RDev\\Console\\Requests\\Parsers\\IParser");
    $commandCompiler = $application->getIoCContainer()->makeShared("RDev\\Console\\Commands\\Compilers\\ICompiler");
    $kernel = new Kernel($requestParser, $commandCompiler, $commandCollection, $application->getLogger(), $application->getVersion());

    return $kernel->handle($argv);
});

/**
 * ----------------------------------------------------------
 * Shut her down
 * ----------------------------------------------------------
 */
$application->shutdown();
exit($statusCode);