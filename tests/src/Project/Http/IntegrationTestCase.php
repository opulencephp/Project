<?php
namespace Project\Http;

use Opulence\Bootstrappers\ApplicationBinder;
use Opulence\Debug\Errors\Handlers\IErrorHandler;
use Opulence\Debug\Exceptions\Handlers\IExceptionHandler;
use Opulence\Framework\Debug\Exceptions\Handlers\Http\IExceptionRenderer;
use Opulence\Framework\Testing\PhpUnit\Http\IntegrationTestCase as BaseIntegrationTestCase;
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
        $paths = require __DIR__ . "/../../../../config/paths.php";
        $this->environment = require __DIR__ . "/../../../../config/environment.php";
        /** @var LoggerInterface $logger */
        /** @var IExceptionRenderer $exceptionRenderer */
        /** @var IExceptionHandler $exceptionHandler */
        /** @var IErrorHandler $errorHandler */
        $logger = require __DIR__ . "/../../../../config/http/logging.php";
        $exceptionHandler = require __DIR__ . "/../../../../config/http/exceptions.php";
        $errorHandler = require __DIR__ . "/../../../../config/http/errors.php";
        $exceptionHandler->register();
        $errorHandler->register();
        $this->exceptionHandler = $exceptionHandler;
        $this->exceptionRenderer = $exceptionRenderer;
        $this->application = require __DIR__ . "/../../../../config/application.php";
        /** @var IContainer $container */
        $this->container = $container;

        /**
         * ----------------------------------------------------------
         * Finish configuring the bootstrappers for the HTTP kernel
         * ----------------------------------------------------------
         *
         * @var ApplicationBinder $applicationBinder
         */
        $applicationBinder->bindToApplication(
            require __DIR__ . "/../../../../config/http/bootstrappers.php",
            false,
            false
        );

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
        return require __DIR__ . "/../../../../config/http/middleware.php";
    }
}