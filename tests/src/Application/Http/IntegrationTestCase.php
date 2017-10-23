<?php
namespace Project\Application\Http;

use Opulence\Debug\Errors\Handlers\IErrorHandler;
use Opulence\Debug\Exceptions\Handlers\IExceptionHandler;
use Opulence\Framework\Configuration\Config;
use Opulence\Framework\Debug\Exceptions\Handlers\Http\IExceptionRenderer;
use Opulence\Framework\Http\Testing\PhpUnit\IntegrationTestCase as BaseIntegrationTestCase;
use Opulence\Ioc\Bootstrappers\Dispatchers\BootstrapperDispatcher;
use Opulence\Ioc\Bootstrappers\Factories\BootstrapperRegistryFactory;
use Opulence\Ioc\Bootstrappers\IBootstrapperResolver;
use Opulence\Ioc\IContainer;
use Psr\Log\LoggerInterface;

/**
 * Defines the HTTP integration test
 */
class IntegrationTestCase extends BaseIntegrationTestCase
{
    /** @var IExceptionHandler The exception handler used by HTTP applications */
    private $exceptionHandler = null;
    /** @var IExceptionRenderer The exception renderer used by HTTP applications */
    private $exceptionRenderer = null;

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        $paths = require __DIR__ . '/../../../../config/paths.php';
        require __DIR__ . '/../../../../config/environment.php';
        /** @var LoggerInterface $logger */
        /** @var IExceptionRenderer $exceptionRenderer */
        /** @var IExceptionHandler $exceptionHandler */
        /** @var IErrorHandler $errorHandler */
        $logger = require __DIR__ . '/../../../../config/http/logging.php';
        $exceptionHandler = require __DIR__ . '/../../../../config/http/exceptions.php';
        $errorHandler = require __DIR__ . '/../../../../config/http/errors.php';
        $exceptionHandler->register();
        $errorHandler->register();
        $this->exceptionHandler = $exceptionHandler;
        $this->exceptionRenderer = $exceptionRenderer;
        require __DIR__ . '/../../../../config/application.php';
        /** @var IContainer $container */
        $this->container = $container;

        /**
         * ----------------------------------------------------------
         * Load some HTTP-specific config settings
         * ----------------------------------------------------------
         */
        Config::setCategory('routing', require Config::get('paths', 'config.http') . '/routing.php');
        Config::setCategory('sessions', require Config::get('paths', 'config.http') . '/sessions.php');

        /**
         * ----------------------------------------------------------
         * Configure the bootstrappers for the HTTP kernel
         * ----------------------------------------------------------
         *
         * @var array $globalBootstrappers
         * @var IBootstrapperResolver $bootstrapperResolver
         * @var ITaskDispatcher $taskDispatcher
         */
        $httpBootstrapperPath = Config::get('paths', 'config.http') . '/bootstrappers.php';
        $httpBootstrappers = require $httpBootstrapperPath;
        $allBootstrappers = array_merge($globalBootstrappers, $httpBootstrappers);
        $bootstrapperFactory = new BootstrapperRegistryFactory($bootstrapperResolver);
        $bootstrapperRegistry = $bootstrapperFactory->createBootstrapperRegistry($allBootstrappers);
        $bootstrapperDispatcher = new BootstrapperDispatcher($container, $bootstrapperRegistry, $bootstrapperResolver);
        $bootstrapperDispatcher->dispatch(false);

        parent::setUp();
    }

    /**
     * @inheritdoc
     */
    protected function getExceptionHandler() : IExceptionHandler
    {
        return $this->exceptionHandler;
    }

    /**
     * @inheritdoc
     */
    protected function getExceptionRenderer() : IExceptionRenderer
    {
        return $this->exceptionRenderer;
    }

    /**
     * @inheritdoc
     */
    protected function getGlobalMiddleware() : array
    {
        return require Config::get('paths', 'config.http') . '/middleware.php';
    }
}
