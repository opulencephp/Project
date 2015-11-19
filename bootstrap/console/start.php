<?php
use Opulence\Bootstrappers\ApplicationBinder;
use Opulence\Bootstrappers\Caching\ICache;
use Opulence\Console\Commands\CommandCollection;
use Opulence\Console\Commands\Compilers\ICompiler;
use Opulence\Console\Requests\Parsers\IParser;
use Opulence\Framework\Console\Kernel;

/**
 * ----------------------------------------------------------
 * Create our paths
 * ----------------------------------------------------------
 */
$paths = require_once __DIR__ . "/../../configs/paths.php";

/**
 * ----------------------------------------------------------
 * Set up the exception and error handlers
 * ----------------------------------------------------------
 */
$exceptionRenderer = require_once __DIR__ . "/../../configs/console/exceptionRenderer.php";
$exceptionHandler = require_once __DIR__ . "/../../configs/exceptionHandler.php";
$errorHandler = require_once __DIR__ . "/../../configs/errorHandler.php";
$exceptionHandler->register();
$errorHandler->register();

/**
 * ----------------------------------------------------------
 * Initialize some application variables
 * ----------------------------------------------------------
 */
$application = require_once __DIR__ . "/../../configs/application.php";

/**
 * ----------------------------------------------------------
 * Configure the bootstrappers for the console kernel
 * ----------------------------------------------------------
 *
 * @var ApplicationBinder $applicationBinder
 */
$applicationBinder->bindToApplication(
    require_once __DIR__ . "/../../configs/console/bootstrappers.php",
    false,
    true,
    $paths["tmp.framework.console"] . "/" . ICache::DEFAULT_CACHED_REGISTRY_FILE_NAME
);

/**
 * ----------------------------------------------------------
 * Let's get started
 * ----------------------------------------------------------
 */
$statusCode = $application->start(function () use ($application, $container, $exceptionHandler, $exceptionRenderer) {
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
    $kernel = new Kernel(
        $requestParser,
        $commandCompiler,
        $commandCollection,
        $exceptionHandler,
        $exceptionRenderer,
        $application->getVersion()
    );

    return $kernel->handle($argv);
});

/**
 * ----------------------------------------------------------
 * Shut her down
 * ----------------------------------------------------------
 */
$application->shutDown();
exit($statusCode);