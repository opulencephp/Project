<?php
use Opulence\Applications\Application;
use Opulence\Applications\Tasks\Dispatchers\ITaskDispatcher;
use Opulence\Framework\Configuration\Config;
use Opulence\Ioc\Bootstrappers\BootstrapperResolver;
use Opulence\Ioc\IContainer;

/**
 * ----------------------------------------------------------
 * Load some global config settings
 * ----------------------------------------------------------
 *
 * @var array $paths The list of paths
 */
Config::setCategory("paths", $paths);
Config::setCategory("views", require __DIR__ . "/http/views.php");

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
 * The following starts settings up the bootstrappers
 */
$bootstrapperResolver = new BootstrapperResolver();
$globalBootstrappers = require __DIR__ . "/bootstrappers.php";

/**
 * ----------------------------------------------------------
 * Set some bindings
 * ----------------------------------------------------------
 *
 * You don't do this in a bootstrapper because you need them
 * bound before bootstrappers are even run
 */
$container->bindInstance(ITaskDispatcher::class, $taskDispatcher);
$container->bindInstance(IContainer::class, $container);

return $application;