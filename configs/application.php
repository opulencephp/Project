<?php
/**
 * Defines the application config
 */
use Monolog\Logger;
use RDev\Applications\Application;
use RDev\Applications\Environments\Environment;
use RDev\Applications\Paths;
use RDev\IoC\IContainer;

/**
 * ----------------------------------------------------------
 * Create the components used by the application
 * ----------------------------------------------------------
 */
$logger = require __DIR__ . "/logging.php";
$environment = require __DIR__ . "/environment.php";
$container = require __DIR__ . "/ioc.php";

// We don't do this in a bootstrapper because we need them bound before bootstrappers are even run
$container->bind(Paths::class, $paths);
$container->bind(Logger::class, $logger);
$container->bind(Environment::class, $environment);
$container->bind(IContainer::class, $container);

/**
 * ----------------------------------------------------------
 * Create the application
 * ----------------------------------------------------------
 */
$application = new Application($paths, $logger, $environment, $container);

return $application;