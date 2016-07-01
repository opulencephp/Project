<?php
use Opulence\Applications\Application;
use Opulence\Applications\Tasks\Dispatchers\ITaskDispatcher;
use Opulence\Bootstrappers\ApplicationBinder;
use Opulence\Bootstrappers\BootstrapperRegistry;
use Opulence\Bootstrappers\Caching\FileCache;
use Opulence\Bootstrappers\Caching\ICache;
use Opulence\Bootstrappers\Dispatchers\BootstrapperDispatcher;
use Opulence\Bootstrappers\Dispatchers\IBootstrapperDispatcher;
use Opulence\Bootstrappers\IBootstrapperRegistry;
use Opulence\Bootstrappers\Paths;
use Opulence\Environments\Environment;
use Opulence\Ioc\IContainer;

/**
 * ----------------------------------------------------------
 * Create the application
 * ----------------------------------------------------------
 */
$taskDispatcher = require __DIR__ . "/tasks.php";
$container = require __DIR__ . "/ioc.php";
$application = new Application($taskDispatcher);

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
$container->bindInstance(Paths::class, $paths);
$container->bindInstance(ITaskDispatcher::class, $taskDispatcher);
$container->bindInstance(Environment::class, $environment);
$container->bindInstance(IContainer::class, $container);
$container->bindInstance(IBootstrapperRegistry::class, $bootstrapperRegistry);
$container->bindInstance(IBootstrapperDispatcher::class, $bootstrapperDispatcher);
$container->bindInstance(ICache::class, $bootstrapperCache);

return $application;