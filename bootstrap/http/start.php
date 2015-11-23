<?php
use Opulence\Bootstrappers\ApplicationBinder;
use Opulence\Bootstrappers\Caching\ICache;
use Opulence\Environments\Environment;
use Opulence\Framework\Http\Kernel;
use Opulence\Http\Requests\Request;
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
 * Configure the bootstrappers for the HTTP kernel
 * ----------------------------------------------------------
 *
 * @var ApplicationBinder $applicationBinder
 */
$applicationBinder->bindToApplication(
    require_once __DIR__ . "/../../config/http/bootstrappers.php",
    false,
    $environment->getName() == Environment::PRODUCTION,
    $paths["tmp.framework.http"] . "/" . ICache::DEFAULT_CACHED_REGISTRY_FILE_NAME
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
    $router = $container->makeShared(Router::class);
    $request = $container->makeShared(Request::class);
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