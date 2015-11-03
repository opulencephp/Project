<?php
use Monolog\Logger;
use Opulence\Applications\Bootstrappers\ApplicationBinder;
use Opulence\Applications\Bootstrappers\Caching\ICache;
use Opulence\Console\Commands\CommandCollection;
use Opulence\Console\Commands\Compilers\ICompiler;
use Opulence\Console\Requests\Parsers\IParser;
use Opulence\Framework\Console\Kernel;

require_once __DIR__ . "/../start.php";

/**
 * ----------------------------------------------------------
 * Configure the bootstrappers for the console kernel
 * ----------------------------------------------------------
 *
 * @var ApplicationBinder $applicationBinder
 */
$applicationBinder->bindToApplication(
    require __DIR__ . "/../../configs/console/bootstrappers.php",
    false,
    true,
    $application->getPaths()["tmp.framework.console"] . "/" . ICache::DEFAULT_CACHED_REGISTRY_FILE_NAME
);

/**
 * ----------------------------------------------------------
 * Let's get started
 * ----------------------------------------------------------
 */
$statusCode = $application->start(function () use ($application) {
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
    $commandCollection = $application->getIoCContainer()->makeShared(CommandCollection::class);
    $requestParser = $application->getIoCContainer()->makeShared(IParser::class);
    $commandCompiler = $application->getIoCContainer()->makeShared(ICompiler::class);
    $logger = require __DIR__ . "/../../configs/console/logging.php";
    $application->getIoCContainer()->bind(Logger::class, $logger);
    $kernel = new Kernel($requestParser, $commandCompiler, $commandCollection, $logger, $application->getVersion());

    return $kernel->handle($argv);
});

/**
 * ----------------------------------------------------------
 * Shut her down
 * ----------------------------------------------------------
 */
$application->shutdown();
exit($statusCode);