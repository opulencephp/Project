<?php
use Opulence\Applications\Tasks\TaskTypes;
use Opulence\Environments\Environment;
use Opulence\Framework\Configuration\Config;
use Opulence\Framework\Http\Kernel;
use Opulence\Http\Requests\Request;
use Opulence\Ioc\Bootstrappers\Caching\FileCache;
use Opulence\Ioc\Bootstrappers\Dispatchers\BootstrapperDispatcher;
use Opulence\Ioc\Bootstrappers\Dispatchers\IBootstrapperDispatcher;
use Opulence\Ioc\Bootstrappers\Factories\BootstrapperRegistryFactory;
use Opulence\Ioc\Bootstrappers\Factories\CachedBootstrapperRegistryFactory;
use Opulence\Ioc\Bootstrappers\IBootstrapperRegistry;
use Opulence\Routing\Router;

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
 * Set up the exception and error handlers
 * ----------------------------------------------------------
 */
$logger = require __DIR__ . "/../../config/http/logging.php";
$exceptionHandler = require_once __DIR__ . "/../../config/http/exceptions.php";
$errorHandler = require_once __DIR__ . "/../../config/http/errors.php";
$exceptionHandler->register();
$errorHandler->register();

/**
 * ----------------------------------------------------------
 * Initialize some application variables
 * ----------------------------------------------------------
 */
$application = require_once __DIR__ . "/../../config/application.php";

/**
 * ----------------------------------------------------------
 * Load some HTTP-specific config settings
 * ----------------------------------------------------------
 */
Config::setCategory("routing", require_once __DIR__ . "/../../config/http/routing.php");
Config::setCategory("sessions", require_once __DIR__ . "/../../config/http/sessions.php");

/**
 * ----------------------------------------------------------
 * Configure the bootstrappers for the HTTP kernel
 * ----------------------------------------------------------
 */
$httpBootstrappers = require __DIR__ . "/../../config/http/bootstrappers.php";
$allBootstrappers = array_merge($globalBootstrappers, $httpBootstrappers);

// If we should cache our bootstrapper registry
if ($environment->getName() == Environment::PRODUCTION) {
    $bootstrapperCache = new FileCache(
        Config::get("paths", "tmp.framework.http") . "/cachedBootstrapperRegistry.json"
    );
    $bootstrapperFactory = new CachedBootstrapperRegistryFactory($bootstrapperResolver, $bootstrapperCache);
    $bootstrapperRegistry = $bootstrapperFactory->createBootstrapperRegistry($allBootstrappers);
} else {
    $bootstrapperFactory = new BootstrapperRegistryFactory($bootstrapperResolver);
    $bootstrapperRegistry = $bootstrapperFactory->createBootstrapperRegistry($allBootstrappers);
}

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
$application->start(function () use ($container, $exceptionHandler, $exceptionRenderer) {
    /**
     * ----------------------------------------------------------
     * Handle the request
     * ----------------------------------------------------------
     *
     * @var Router $router
     * @var Request $request
     */
    $router = $container->resolve(Router::class);
    $request = $container->resolve(Request::class);
    $kernel = new Kernel($container, $router, $exceptionHandler, $exceptionRenderer);
    $kernel->addMiddleware(require_once __DIR__ . "/../../config/http/middleware.php");
    $response = $kernel->handle($request);
    $response->send();
});

/**
 * ----------------------------------------------------------
 * Shut her down
 * ----------------------------------------------------------
 */
$application->shutDown();