<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Boots up our application with an HTTP kernel
 */
use RDev\HTTP\Kernels\Kernel;
use RDev\HTTP\Requests\Request;
use RDev\HTTP\Routing\Router;

require_once __DIR__ . "/../start.php";

/**
 * ----------------------------------------------------------
 * Let's get started
 * ----------------------------------------------------------
 */
$application->registerBootstrappers(require_once $paths["configs"] . "/http/bootstrappers.php");
$application->start(function() use ($application)
{
    /**
     * ----------------------------------------------------------
     * Setup the router
     * ----------------------------------------------------------
     *
     * @var Router $router
     */
    $paths = $application->getPaths();
    $router = $application->getIoCContainer()->makeShared("RDev\\HTTP\\Routing\\Router");
    require_once $paths["configs"] . "/http/routing.php";

    /**
     * ----------------------------------------------------------
     * Handle the request
     * ----------------------------------------------------------
     *
     * @var Request $request
     */
    $request = $application->getIoCContainer()->makeShared("RDev\\HTTP\\Requests\\Request");
    $kernel = new Kernel($application->getIoCContainer(), $router, $application->getLogger());
    $kernel->addMiddleware(require_once $paths["configs"] . "/http/middleware.php");
    $response = $kernel->handle($request);
    $response->send();
});

/**
 * ----------------------------------------------------------
 * Shut her down
 * ----------------------------------------------------------
 */
$application->shutdown();