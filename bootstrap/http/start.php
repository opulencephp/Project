<?php
/**
 * Boots up our application with an HTTP kernel
 */
use RDev\Applications\Bootstrappers\IO\BootstrapperIO;
use RDev\Framework\HTTP\Kernel;
use RDev\HTTP\Requests\Request;
use RDev\Routing\Router;

require_once __DIR__ . "/../start.php";

/**
 * ----------------------------------------------------------
 * Setup the bootstrappers
 * ----------------------------------------------------------
 *
 * @var Closure $configureBootstrappers
 */
$configureBootstrappers = require __DIR__ . "/../configureBootstrappers.php";
$configureBootstrappers(
    $application,
    require $application->getPaths()["configs"] . "/http/bootstrappers.php",
    false,
    true,
    $application->getPaths()["tmp.framework.http"] . "/" . BootstrapperIO::DEFAULT_CACHED_REGISTRY_FILE_NAME
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
    $router = $application->getIoCContainer()->makeShared("RDev\\Routing\\Router");
    $request = $application->getIoCContainer()->makeShared("RDev\\HTTP\\Requests\\Request");
    $kernel = new Kernel($application->getIoCContainer(), $router, $application->getLogger());
    $kernel->addMiddleware(require $application->getPaths()["configs"] . "/http/middleware.php");
    $response = $kernel->handle($request);
    $response->send();
});

/**
 * ----------------------------------------------------------
 * Shut her down
 * ----------------------------------------------------------
 */
$application->shutdown();