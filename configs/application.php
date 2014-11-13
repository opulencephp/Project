<?php
/**
 * Copyright (C) 2014 David Young
 * 
 * Defines the application config
 */
use RDev\Applications\Application;

$logger = require_once __DIR__ . "/logging.php";
$environment = require_once __DIR__ . "/environment.php";
$container = require_once __DIR__ . "/ioc.php";
$session = require_once __DIR__ . "/session.php";
$application = new Application($logger, $environment, $container, $session);
$application->registerBootstrappers(require_once __DIR__ . "/bootstrappers.php");

return $application;