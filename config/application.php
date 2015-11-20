<?php
use Opulence\Applications\Application;
use Opulence\Applications\Environments\Environment;
use Opulence\Applications\Tasks\Dispatchers\IDispatcher as ITaskDispatcher;
use Opulence\Bootstrappers\ApplicationBinder;
use Opulence\Bootstrappers\BootstrapperRegistry;
use Opulence\Bootstrappers\Caching\FileCache;
use Opulence\Bootstrappers\Caching\ICache;
use Opulence\Bootstrappers\Dispatchers\Dispatcher as BootstrapperDispatcher;
use Opulence\Bootstrappers\Dispatchers\IDispatcher as IBootstrapperDispatcher;
use Opulence\Bootstrappers\IBootstrapperRegistry;
use Opulence\Bootstrappers\Paths;
use Opulence\Ioc\IContainer;

/**
 * ----------------------------------------------------------
 * Create the application
 * ----------------------------------------------------------
 */
$taskDispatcher = require __DIR__ . "/tasks.php";
$container = require __DIR__ . "/ioc.php";
$application = new Application($taskDispatcher, $environment);

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
$bootstrapperCache = new FileCache($paths);
$applicationBinder = new ApplicationBinder(
    $bootstrapperRegistry,
    $bootstrapperDispatcher,
    $bootstrapperCache,
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
$container->bind(ICache::class, $bootstrapperCache);

return $application;