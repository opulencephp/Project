<?php
use Opulence\Console\Commands\CommandCollection;
use Opulence\Console\Commands\Compilers\ICompiler;
use Opulence\Console\Kernel;
use Opulence\Console\Requests\Parsers\IParser;
use Opulence\Framework\Configuration\Config;
use Opulence\Ioc\Bootstrappers\Caching\FileCache;
use Opulence\Ioc\Bootstrappers\Dispatchers\BootstrapperDispatcher;
use Opulence\Ioc\Bootstrappers\Dispatchers\IBootstrapperDispatcher;
use Opulence\Ioc\Bootstrappers\Factories\CachedBootstrapperRegistryFactory;
use Opulence\Ioc\Bootstrappers\IBootstrapperRegistry;

/**
 * ----------------------------------------------------------
 * Create your paths
 * ----------------------------------------------------------
 */
$paths = require_once __DIR__ . '/../../config/paths.php';

/**
 * ----------------------------------------------------------
 * Autoload your dependencies
 * ----------------------------------------------------------
 */
require "{$paths['vendor']}/autoload.php";

/**
 * ----------------------------------------------------------
 * Set up the environment
 * ----------------------------------------------------------
 */
require __DIR__ . '/../../config/environment.php';

/**
 * ----------------------------------------------------------
 * Configure the bootstrappers for the console kernel
 * ----------------------------------------------------------
 */
require __DIR__ . '/../../config/application.php';
$consoleBootstrapperPath = Config::get('paths', 'config.console') . '/bootstrappers.php';
$consoleBootstrappers = require $consoleBootstrapperPath;
$allBootstrappers = array_merge($globalBootstrappers, $consoleBootstrappers);
$bootstrapperCache = new FileCache(
    Config::get('paths', 'tmp.framework.console') . '/cachedBootstrapperRegistry.json',
    max(filemtime($globalBootstrapperPath), filemtime($consoleBootstrapperPath))
);
$bootstrapperFactory = new CachedBootstrapperRegistryFactory($bootstrapperResolver, $bootstrapperCache);
$bootstrapperRegistry = $bootstrapperFactory->createBootstrapperRegistry($allBootstrappers);
$bootstrapperDispatcher = new BootstrapperDispatcher($container, $bootstrapperRegistry, $bootstrapperResolver);
$container->bindInstance(IBootstrapperRegistry::class, $bootstrapperRegistry);
$container->bindInstance(IBootstrapperDispatcher::class, $bootstrapperDispatcher);

/**
 * ----------------------------------------------------------
 * Handle the request
 * ----------------------------------------------------------
 *
 * @var CommandCollection $commandCollection
 * @var IParser $requestParser
 * @var ICompiler $commandCompiler
 */
global $argv;
$bootstrapperDispatcher->dispatch(false);
$commandCollection = $container->resolve(CommandCollection::class);
$requestParser = $container->resolve(IParser::class);
$commandCompiler = $container->resolve(ICompiler::class);
$kernel = new Kernel($requestParser, $commandCompiler, $commandCollection);
$statusCode = $kernel->handle($argv);
exit($statusCode);
