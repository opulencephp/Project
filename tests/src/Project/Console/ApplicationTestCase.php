<?php
namespace Project\Console;

use Opulence\Bootstrappers\ApplicationBinder;
use Opulence\Debug\Errors\Handlers\IErrorHandler;
use Opulence\Debug\Exceptions\Handlers\IExceptionHandler;
use Opulence\Framework\Debug\Exceptions\Handlers\Console\IConsoleExceptionRenderer;
use Opulence\Framework\Testing\PhpUnit\Console\ApplicationTestCase as BaseTestCase;
use Opulence\Ioc\IContainer;

/**
 * Defines the console application test case
 */
class ApplicationTestCase extends BaseTestCase
{
    /** @var IConsoleExceptionRenderer The exception renderer used by console applications */
    private $exceptionRenderer = null;
    /** @var IExceptionHandler The exception handler used by console applications */
    private $exceptionHandler = null;

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        /** @var IConsoleExceptionRenderer $exceptionRenderer */
        /** @var IExceptionHandler $exceptionHandler */
        /** @var IErrorHandler $errorHandler */
        $exceptionRenderer = require __DIR__ . "/../../../../configs/console/exceptionRenderer.php";
        $exceptionHandler = require __DIR__ . "/../../../../configs/exceptionHandler.php";
        $errorHandler = require __DIR__ . "/../../../../configs/errorHandler.php";
        $exceptionHandler->register();
        $errorHandler->register();
        $this->exceptionHandler = $exceptionHandler;
        $this->exceptionRenderer = $exceptionRenderer;

        parent::setUp();
    }

    /**
     * @inheritdoc
     */
    protected function getExceptionHandler()
    {
        return $this->exceptionHandler;
    }

    /**
     * @inheritdoc
     */
    protected function getExceptionRenderer()
    {
        return $this->exceptionRenderer;
    }

    /**
     * @inheritdoc
     */
    protected function setApplicationAndIocContainer()
    {
        $paths = require __DIR__ . "/../../../../configs/paths.php";
        $this->application = require __DIR__ . "/../../../../configs/application.php";
        /** @var IContainer $container */
        $this->container = $container;

        /**
         * ----------------------------------------------------------
         * Finish configuring the bootstrappers for the console kernel
         * ----------------------------------------------------------
         *
         * @var ApplicationBinder $applicationBinder
         */
        $applicationBinder->bindToApplication(
            require __DIR__ . "/../../../../configs/console/bootstrappers.php",
            false,
            false
        );
    }
}