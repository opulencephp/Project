<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Boots up our application with an HTTP kernel
 */
use RDev\HTTP\Kernels\Kernel;
use RDev\HTTP\Requests\Request;
use RDev\HTTP\Routing\Router;

require_once __DIR__ . "/../../vendor/autoload.php";
require_once __DIR__ . "/../../configs/php.php";

$request = Request::createFromGlobals();

// Setup the application
$application = require_once __DIR__ . "/../../configs/application.php";
$application->getIoCContainer()->bind("RDev\\HTTP\\Requests\\Request", $request);
$application->registerBootstrappers(require_once __DIR__ . "/../../configs/http/bootstrappers.php");
$application->start();

// Setup the router
/** @var Router $router */
$router = $application->getIoCContainer()->makeShared("RDev\\HTTP\\Routing\\Router");
require_once __DIR__ . "/../../configs/routing.php";

// Handle the request
$response = (new Kernel($router, $application->getLogger()))->handle($request);
$response->send();
$application->shutdown();