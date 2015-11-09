<?php
use Monolog\Logger;
use Opulence\Bootstrappers\ApplicationBinder;
use Opulence\Bootstrappers\Caching\ICache;
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
    $paths["tmp.framework.console"] . "/" . ICache::DEFAULT_CACHED_REGISTRY_FILE_NAME
);

/**
 * ----------------------------------------------------------
 * Let's get started
 * ----------------------------------------------------------
 */
$statusCode = $application->start(function () use ($application, $container) {
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
    $commandCollection = $container->makeShared(CommandCollection::class);
    $requestParser = $container->makeShared(IParser::class);
    $commandCompiler = $container->makeShared(ICompiler::class);
    $logger = require __DIR__ . "/../../configs/console/logging.php";
    $container->bind(Logger::class, $logger);
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