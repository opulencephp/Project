<?php
namespace Project\Console;

use Opulence\Bootstrappers\ApplicationBinder;
use Opulence\Exceptions\ExceptionHandler;
use Opulence\Framework\Exceptions\Console\IConsoleExceptionRenderer;
use Opulence\Framework\Testing\PhpUnit\Console\ApplicationTestCase as BaseTestCase;
use Opulence\Ioc\IContainer;

/**
 * Defines the console application test case
 */
class ApplicationTestCase extends BaseTestCase
{
    /** @var ExceptionHandler The exception handler used by console applications */
    private $exceptionHandler = null;
    /** @var IConsoleExceptionRenderer The exception renderer used by console applications */
    private $exceptionRenderer = null;

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        /** @var $exceptionRenderer IConsoleExceptionRenderer */
        $exceptionRenderer = require __DIR__ . "/../../../../configs/console/exceptions.php";
        $this->exceptionHandler = require __DIR__ . "/../../../../configs/exceptions.php";
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
        require __DIR__ . "/../../../../configs/paths.php";
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