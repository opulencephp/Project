<?php
/**
 * Copyright (C) 2014 David Young
 *
 * Boots up our application
 */
use RDev\Applications\Configs;
use RDev\Applications\Factories;

require_once(__DIR__ . "/../vendor/autoload.php");

// Configure the application
$configArray = [
    "environment" => require_once(__DIR__ . "/../configs/environment.php"),
    "ioc" => require_once(__DIR__ . "/../configs/ioc.php"),
    "monolog" => require_once(__DIR__ . "/../configs/logging.php"),
    "routing" => require_once(__DIR__ . "/../configs/routing.php"),
    "session" => require_once(__DIR__ . "/../configs/session.php"),
    "bootstrappers" => require_once(__DIR__ . "/../configs/bootstrappers.php")
];
$config = new Configs\ApplicationConfig($configArray);
$application = (new Factories\ApplicationFactory())->createFromConfig($config);
$application->start();
$application->shutdown();