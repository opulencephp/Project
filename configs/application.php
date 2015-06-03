<?php
/**
 * Defines the application config
 */
use RDev\Applications\Application;
use RDev\Applications\Bootstrappers\Dispatchers\Dispatcher;
use RDev\Applications\Bootstrappers\Dispatchers\IDispatcher;
use RDev\Applications\Bootstrappers\IO\BootstrapperIO;

/**
 * ----------------------------------------------------------
 * Create the components used by the application
 * ----------------------------------------------------------
 */
$logger = require __DIR__ . "/logging.php";
$environment = require __DIR__ . "/environment.php";
$container = require __DIR__ . "/ioc.php";

// We don't do this in a bootstrapper because we need them bound before bootstrappers are even run
$container->bind("RDev\\Applications\\Paths", $paths);
$container->bind("Monolog\\Logger", $logger);
$container->bind("RDev\\Applications\\Environments\\Environment", $environment);
$container->bind("RDev\\IoC\\IContainer", $container);

/**
 * ----------------------------------------------------------
 * Create the application
 * ----------------------------------------------------------
 */
$application = new Application($paths, $logger, $environment, $container);

/**
 * ----------------------------------------------------------
 * Setup the bootstrappers
 * ----------------------------------------------------------
 *
 * To disable lazy loading of of bootstrappers, set the forceEagerLoading()
 * parameter to true. If you override the dispatcher or registry classes, make
 * sure they implement IDispatcher and IBootstrapperRegistry, respectively.
 */
$bootstrapperDispatcher = new Dispatcher($application);
$bootstrapperDispatcher->forceEagerLoading(false);
$bootstrapperIO = new BootstrapperIO($paths["tmp.framework"], $paths, $environment);
$bootstrapperIO->registerBootstrapperClasses(require __DIR__ . "/bootstrappers.php");
// Bind them to the container so they can be injected by the container to any components that need them
$container->bind(IDispatcher::class, $bootstrapperDispatcher);
$container->bind(BootstrapperIO::class, $bootstrapperIO);

return $application;