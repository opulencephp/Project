<?php
/**
 * Defines the application config
 */
use RDev\Applications\Application;
use RDev\Applications\Bootstrappers\ApplicationBinder;
use RDev\Applications\Bootstrappers\BootstrapperRegistry;
use RDev\Applications\Bootstrappers\Dispatchers\Dispatcher as BootstrapperDispatcher;
use RDev\Applications\Bootstrappers\Dispatchers\IDispatcher as IBootstrapperDispatcher;
use RDev\Applications\Bootstrappers\IO\BootstrapperIO;
use RDev\Applications\Bootstrappers\IO\IBootstrapperIO;
use RDev\Applications\Bootstrappers\IBootstrapperRegistry;
use RDev\Applications\Environments\Environment;
use RDev\Applications\Paths;
use RDev\Applications\Tasks\Dispatchers\IDispatcher as ITaskDispatcher;
use RDev\IoC\IContainer;

/**
 * ----------------------------------------------------------
 * Create the application
 * ----------------------------------------------------------
 */
$taskDispatcher = require __DIR__ . "/tasks.php";
$environment = require __DIR__ . "/environment.php";
$container = require __DIR__ . "/ioc.php";
$application = new Application($paths, $taskDispatcher, $environment, $container);

/**
 * ----------------------------------------------------------
 * Set up the bootstrappers
 * ----------------------------------------------------------
 *
 * The following sets up the global bootstrappers and creates
 * application tasks to actually run the bootstrappers
 */
$bootstrapperRegistry = new BootstrapperRegistry($paths, $environment);
$bootstrapperDispatcher = new BootstrapperDispatcher($taskDispatcher, $container);
$bootstrapperIO = new BootstrapperIO($paths);
$applicationBinder = new ApplicationBinder(
    $bootstrapperRegistry,
    $bootstrapperDispatcher,
    $bootstrapperIO,
    $taskDispatcher,
    require __DIR__ . "/bootstrappers.php"
);

/**
 * ----------------------------------------------------------
 * Set some bindings
 * ----------------------------------------------------------
 *
 * We don't do this in a bootstrapper because we need them
 * bound before bootstrappers are even run
 */
$container->bind(Paths::class, $paths);
$container->bind(ITaskDispatcher::class, $taskDispatcher);
$container->bind(Environment::class, $environment);
$container->bind(IContainer::class, $container);
$container->bind(IBootstrapperRegistry::class, $bootstrapperRegistry);
$container->bind(IBootstrapperDispatcher::class, $bootstrapperDispatcher);
$container->bind(IBootstrapperIO::class, $bootstrapperIO);

return $application;