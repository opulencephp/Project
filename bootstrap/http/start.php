<?php
use Opulence\Applications\Environments\Environment;
use Opulence\Bootstrappers\ApplicationBinder;
use Opulence\Bootstrappers\Caching\ICache;
use Opulence\Framework\Http\Kernel;
use Opulence\Http\Requests\Request;
use Opulence\Routing\Router;

/**
 * ----------------------------------------------------------
 * Create our paths
 * ----------------------------------------------------------
 */
require_once __DIR__ . "/../../configs/paths.php";

/**
 * ----------------------------------------------------------
 * Set the HTTP exception renderer
 * ----------------------------------------------------------
 */
$exceptionRenderer = require_once __DIR__ . "/../../configs/http/exceptions.php";
$exceptionHandler = require __DIR__ . "/../../configs/exceptions.php";

/**
 * ----------------------------------------------------------
 * Initialize some application variables
 * ----------------------------------------------------------
 */
$application = require_once __DIR__ . "/../../configs/application.php";

/**
 * ----------------------------------------------------------
 * Configure the bootstrappers for the HTTP kernel
 * ----------------------------------------------------------
 *
 * @var ApplicationBinder $applicationBinder
 */
$applicationBinder->bindToApplication(
    require __DIR__ . "/../../configs/http/bootstrappers.php",
    false,
    $application->getEnvironment()->getName() == Environment::PRODUCTION,
    $paths["tmp.framework.http"] . "/" . ICache::DEFAULT_CACHED_REGISTRY_FILE_NAME
);

/**
 * ----------------------------------------------------------
 * Let's get started
 * ----------------------------------------------------------
 */
$application->start(function () use ($application, $container, $exceptionHandler, $exceptionRenderer) {
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
    $kernel->addMiddleware(require __DIR__ . "/../../configs/http/middleware.php");
    $response = $kernel->handle($request);
    $response->send();
});

/**
 * ----------------------------------------------------------
 * Shut her down
 * ----------------------------------------------------------
 */
$application->shutDown();