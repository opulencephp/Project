<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the application config
 */
use RDev\Applications\Application;

/**
 * ----------------------------------------------------------
 * Create the components used by the application
 * ----------------------------------------------------------
 */
$logger = require_once __DIR__ . "/logging.php";
$environment = require_once __DIR__ . "/environment.php";
$container = require_once __DIR__ . "/ioc.php";
$session = require_once __DIR__ . "/session.php";

// We don't do this in a bootstrapper because we need them bound before bootstrappers are even run
$container->bind("RDev\\Applications\\Paths", $paths);
$container->bind("Monolog\\Logger", $logger);
$container->bind("RDev\\Applications\\Environments\\Environment", $environment);
$container->bind("RDev\\IoC\\IContainer", $container);
$container->bind("RDev\\Sessions\\ISession", $session);

/**
 * ----------------------------------------------------------
 * Create the application
 * ----------------------------------------------------------
 */
$application = new Application($paths, $logger, $environment, $container, $session);
$application->registerBootstrappers(require_once __DIR__ . "/bootstrappers.php");

return $application;