<?php
use Opulence\Applications\Tasks\TaskTypes;
use Opulence\Console\Commands\CommandCollection;
use Opulence\Console\Commands\Compilers\ICompiler;
use Opulence\Console\Kernel;
use Opulence\Console\Requests\Parsers\IParser;
use Opulence\Framework\Configuration\Config;
use Opulence\Ioc\Bootstrappers\Caching\FileCache;
use Opulence\Ioc\Bootstrappers\Dispatchers\BootstrapperDispatcher;
use Opulence\Ioc\Bootstrappers\Dispatchers\IBootstrapperDispatcher;
use Opulence\Ioc\Bootstrappers\Factories\CachedBootstrapperRegistryFactory;
use Opulence\Ioc\Bootstrappers\IBootstrapperRegistry;

/**
 * ----------------------------------------------------------
 * Create your paths
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
 */
$consoleBootstrappers = require Config::get("paths", "config.console") . "/bootstrappers.php";
$allBootstrappers = array_merge($globalBootstrappers, $consoleBootstrappers);
$bootstrapperCache = new FileCache(
    Config::get("paths", "tmp.framework.console") . "/cachedBootstrapperRegistry.json"
);
$bootstrapperFactory = new CachedBootstrapperRegistryFactory($bootstrapperResolver, $bootstrapperCache);
$bootstrapperRegistry = $bootstrapperFactory->createBootstrapperRegistry($allBootstrappers);
$bootstrapperDispatcher = new BootstrapperDispatcher($container, $bootstrapperRegistry, $bootstrapperResolver);
$container->bindInstance(IBootstrapperRegistry::class, $bootstrapperRegistry);
$container->bindInstance(IBootstrapperDispatcher::class, $bootstrapperDispatcher);
$taskDispatcher->registerTask(
    TaskTypes::PRE_START,
    function () use ($bootstrapperDispatcher) {
        $bootstrapperDispatcher->startBootstrappers(false);
    }
);
$taskDispatcher->registerTask(
    TaskTypes::PRE_SHUTDOWN,
    function () use ($bootstrapperDispatcher) {
        $bootstrapperDispatcher->shutDownBootstrappers();
    }
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