<?php
/**
 * Boots up our application with an HTTP kernel
 */
use RDev\Applications\Bootstrappers\ApplicationBinder;
use RDev\Applications\Bootstrappers\Caching\ICache;
use RDev\Applications\Environments\Environment;
use RDev\Framework\HTTP\Kernel;
use RDev\HTTP\Requests\Request;
use RDev\Routing\Router;

require_once __DIR__ . "/../start.php";

/**
 * ----------------------------------------------------------
 * Finish configuring the bootstrappers for the HTTP kernel
 * ----------------------------------------------------------
 *
 * @var ApplicationBinder $applicationBinder
 */
$applicationBinder->bindToApplication(
    require __DIR__ . "/../../configs/http/bootstrappers.php",
    false,
    $application->getEnvironment()->getName() == Environment::PRODUCTION,
    $application->getPaths()["tmp.framework.http"] . "/" . ICache::DEFAULT_CACHED_REGISTRY_FILE_NAME
);

/**
 * ----------------------------------------------------------
 * Let's get started
 * ----------------------------------------------------------
 */
$application->start(function() use ($application)
{
    /**
     * ----------------------------------------------------------
     * Handle the request
     * ----------------------------------------------------------
     *
     * @var Router $router
     * @var Request $request
     */
    $router = $application->getIoCContainer()->makeShared(Router::class);
    $request = $application->getIoCContainer()->makeShared(Request::class);
    $logger = require __DIR__ . "/../../configs/http/logging.php";
    $kernel = new Kernel($application->getIoCContainer(), $router, $logger);
    $kernel->addMiddleware(require __DIR__ . "/../../configs/http/middleware.php");
    $response = $kernel->handle($request);
    $response->send();
});

/**
 * ----------------------------------------------------------
 * Shut her down
 * ----------------------------------------------------------
 */
$application->shutdown();