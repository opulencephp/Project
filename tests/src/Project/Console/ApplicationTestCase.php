<?php
namespace Project\Console;

use Opulence\Bootstrappers\ApplicationBinder;
use Opulence\Console\Debug\Exceptions\Handlers\IExceptionRenderer;
use Opulence\Debug\Errors\Handlers\IErrorHandler;
use Opulence\Debug\Exceptions\Handlers\IExceptionHandler;
use Opulence\Framework\Testing\PhpUnit\Console\ApplicationTestCase as BaseTestCase;
use Opulence\Ioc\IContainer;

/**
 * Defines the console application test case
 */
class ApplicationTestCase extends BaseTestCase
{
    /** @var IExceptionRenderer The exception renderer used by console applications */
    private $exceptionRenderer = null;
    /** @var IExceptionHandler The exception handler used by console applications */
    private $exceptionHandler = null;

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        $paths = require __DIR__ . "/../../../../config/paths.php";
        $environment = require __DIR__ . "/../../../../config/environment.php";
        /** @var IExceptionRenderer $exceptionRenderer */
        /** @var IExceptionHandler $exceptionHandler */
        /** @var IErrorHandler $errorHandler */
        $exceptionRenderer = require __DIR__ . "/../../../../config/console/exceptionRenderer.php";
        $exceptionHandler = require __DIR__ . "/../../../../config/exceptionHandler.php";
        $errorHandler = require __DIR__ . "/../../../../config/errorHandler.php";
        $exceptionHandler->register();
        $errorHandler->register();
        $this->exceptionHandler = $exceptionHandler;
        $this->exceptionRenderer = $exceptionRenderer;
        $this->application = require __DIR__ . "/../../../../config/application.php";
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
            require __DIR__ . "/../../../../config/console/bootstrappers.php",
            false,
            false
        );

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
}