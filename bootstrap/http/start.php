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
require_once $paths["vendor"] . "/rdev/rdev/app/rdev/framework/http/start.php";

/**
 * ----------------------------------------------------------
 * Let's get started
 * ----------------------------------------------------------
 */
$application->registerBootstrappers(require_once __DIR__ . "/../../configs/http/bootstrappers.php");
$application->start();

/**
 * ----------------------------------------------------------
 * Setup the router
 * ----------------------------------------------------------
 */
/** @var Router $router */
$router = $application->getIoCContainer()->makeShared("RDev\\HTTP\\Routing\\Router");
require_once __DIR__ . "/../../configs/routing.php";

/**
 * ----------------------------------------------------------
 * Handle the request
 * ----------------------------------------------------------
 */
/** @var Request $request */
$response = (new Kernel($router, $application->getLogger()))->handle($request);
$response->send();

/**
 * ----------------------------------------------------------
 * Shut her down
 * ----------------------------------------------------------
 */
$application->shutdown();