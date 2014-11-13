<?php
/**
 * Copyright (C) 2014 David Young
 *
 * Boots up our application
 */
use RDev\Applications\Kernels\HTTP\Kernel;
use RDev\HTTP\Request;
use RDev\Routing\Router;

require_once(__DIR__ . "/../vendor/autoload.php");

$application = require_once(__DIR__ . "/../configs/application.php");
$application->start();
/** @var Router $router */
$router = $application->getIoCContainer()->makeShared("RDev\\Routing\\Router");
require_once(__DIR__ . "/../configs/routing.php");
$response = (new Kernel($router))->handle(Request::createFromGlobals());
$response->send();
$application->shutdown();