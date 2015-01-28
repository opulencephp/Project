<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Boots up our application with an HTTP kernel
 */
use RDev\HTTP\Kernels\Kernel;
use RDev\HTTP\Requests\Request;
use RDev\HTTP\Routing\Router;

/**
 * ----------------------------------------------------------
 * Do some setup
 * ----------------------------------------------------------
 */
require_once __DIR__ . "/../start.php";
$request = Request::createFromGlobals();
$application->getIoCContainer()->bind("RDev\\HTTP\\Requests\\Request", $request);

/**
 * ----------------------------------------------------------
 * Let's get started
 * ----------------------------------------------------------
 */
$application->registerBootstrappers(require_once $paths["configs"] . "/http/bootstrappers.php");
$application->start();

/**
 * ----------------------------------------------------------
 * Setup the router
 * ----------------------------------------------------------
 *
 * @var Router $router
 */
$router = $application->getIoCContainer()->makeShared("RDev\\HTTP\\Routing\\Router");
require_once $paths["configs"] . "/http/routing.php";

/**
 * ----------------------------------------------------------
 * Handle the request
 * ----------------------------------------------------------
 */
$response = (new Kernel($router, $application->getLogger()))->handle($request);
$response->send();

/**
 * ----------------------------------------------------------
 * Shut her down
 * ----------------------------------------------------------
 */
$application->shutdown();