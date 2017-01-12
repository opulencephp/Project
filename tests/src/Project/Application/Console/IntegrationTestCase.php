<?php
namespace Project\Application\Console;

use Opulence\Applications\Tasks\Dispatchers\ITaskDispatcher;
use Opulence\Applications\Tasks\TaskTypes;
use Opulence\Framework\Configuration\Config;
use Opulence\Framework\Console\Testing\PhpUnit\IntegrationTestCase as BaseIntegrationTestCase;
use Opulence\Ioc\Bootstrappers\Caching\FileCache;
use Opulence\Ioc\Bootstrappers\Caching\ICache;
use Opulence\Ioc\Bootstrappers\Dispatchers\BootstrapperDispatcher;
use Opulence\Ioc\Bootstrappers\Factories\BootstrapperRegistryFactory;
use Opulence\Ioc\Bootstrappers\IBootstrapperResolver;
use Opulence\Ioc\IContainer;

/**
 * Defines the console application integration test
 */
class IntegrationTestCase extends BaseIntegrationTestCase
{
    /**
     * @inheritdoc
     */
    public function setUp()
    {
        require __DIR__ . '/../../../../../config/paths.php';
        require __DIR__ . '/../../../../../config/environment.php';
        $this->application = require __DIR__ . '/../../../../../config/application.php';
        /** @var IContainer $container */
        $this->container = $container;

        /**
         * ----------------------------------------------------------
         * Configure the bootstrappers for the console kernel
         * ----------------------------------------------------------
         *
         * @var string $globalBootstrapperPath
         * @var array $globalBootstrappers
         * @var IBootstrapperResolver $bootstrapperResolver
         * @var ITaskDispatcher $taskDispatcher
         */
        $consoleBootstrapperPath = Config::get('paths', 'config.console') . '/bootstrappers.php';
        $bootstrapperCache = new FileCache(
            Config::get('paths', 'tmp.framework.console') . '/cachedBootstrapperRegistry.json',
            max(filemtime($globalBootstrapperPath), filemtime($consoleBootstrapperPath))
        );
        $container->bindInstance(ICache::class, $bootstrapperCache);
        $consoleBootstrappers = require $consoleBootstrapperPath;
        $allBootstrappers = array_merge($globalBootstrappers, $consoleBootstrappers);
        $bootstrapperFactory = new BootstrapperRegistryFactory($bootstrapperResolver);
        $bootstrapperRegistry = $bootstrapperFactory->createBootstrapperRegistry($allBootstrappers);
        $bootstrapperDispatcher = new BootstrapperDispatcher($container, $bootstrapperRegistry, $bootstrapperResolver);
        $taskDispatcher->registerTask(
            TaskTypes::PRE_START,
            function () use ($bootstrapperDispatcher) {
                $bootstrapperDispatcher->startBootstrappers(false);
            }
        );
        $taskDispatcher->registerTask(
            TaskTypes::PRE_SHUTDOWN,
            function () use ($bootstrapperDispatcher) {
                $bootstrapperDispatcher->shutDownBootstrappers();
            }
        );

        parent::setUp();
    }
}
