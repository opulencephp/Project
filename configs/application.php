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
$sql = require_once __DIR__ . "/sql.php";

// We don't do this in a bootstrapper because we need them bound before bootstrappers are even run
$container->bind("Monolog\\Logger", $logger);
$container->bind("RDev\\Applications\\Environments\\Environment", $environment);
$container->bind("RDev\\IoC\\IContainer", $container);
$container->bind("RDev\\Sessions\\ISession", $session);
$container->bind("RDev\\Databases\\SQL\\ConnectionPool", $sql);

/**
 * ----------------------------------------------------------
 * (Optional) Bind a Redis instance
 * ----------------------------------------------------------
 */
// Move the code out of the "if" statement to enable Redis
if(false)
{
    $redis = require_once __DIR__ . "/redis.php";
    $container->bind("RDev\\Databases\\NoSQL\\Redis\\IRedis", $redis);
}

/**
 * ----------------------------------------------------------
 * Create the application
 * ----------------------------------------------------------
 */
$application = new Application($logger, $environment, $container, $session);
$application->registerBootstrappers(require_once __DIR__ . "/bootstrappers.php");

return $application;