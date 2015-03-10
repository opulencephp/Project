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
$application->registerBootstrappers(require $application->getPaths()["configs"] . "/http/bootstrappers.php");
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
    $router = $application->getIoCContainer()->makeShared("RDev\\HTTP\\Routing\\Router");
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