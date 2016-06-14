<?php
use Opulence\Bootstrappers\ApplicationBinder;
use Opulence\Bootstrappers\Caching\ICache;
use Opulence\Console\Commands\CommandCollection;
use Opulence\Console\Commands\Compilers\ICompiler;
use Opulence\Console\Kernel;
use Opulence\Console\Requests\Parsers\IParser;

/**
 * ----------------------------------------------------------
 * Create our paths
 * ----------------------------------------------------------
 */
$paths = require_once __DIR__ . "/../../config/paths.php";

/**
 * ----------------------------------------------------------
 * Set up the environment
 * ----------------------------------------------------------
 */
$environment = require __DIR__ . "/../../config/environment.php";

/**
 * ----------------------------------------------------------
 * Initialize some application variables
 * ----------------------------------------------------------
 */
$application = require_once __DIR__ . "/../../config/application.php";

/**
 * ----------------------------------------------------------
 * Configure the bootstrappers for the console kernel
 * ----------------------------------------------------------
 *
 * @var ApplicationBinder $applicationBinder
 */
$applicationBinder->bindToApplication(
    require_once __DIR__ . "/../../config/console/bootstrappers.php",
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
    $commandCollection = $container->resolve(CommandCollection::class);
    $requestParser = $container->resolve(IParser::class);
    $commandCompiler = $container->resolve(ICompiler::class);
    $kernel = new Kernel(
        $requestParser,
        $commandCompiler,
        $commandCollection,
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