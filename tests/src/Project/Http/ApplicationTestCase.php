<?php
namespace Project\Http;

use Opulence\Bootstrappers\ApplicationBinder;
use Opulence\Exceptions\ExceptionHandler;
use Opulence\Framework\Exceptions\Http\IHttpExceptionRenderer;
use Opulence\Framework\Testing\PhpUnit\Http\ApplicationTestCase as BaseTestCase;
use Opulence\Ioc\IContainer;

/**
 * Defines the HTTP application test case
 */
class ApplicationTestCase extends BaseTestCase
{
    /** @var ExceptionHandler The exception handler used by HTTP applications */
    private $exceptionHandler = null;
    /** @var IHttpExceptionRenderer The exception renderer used by HTTP applications */
    private $exceptionRenderer = null;

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        /** @var $exceptionRenderer IHttpExceptionRenderer */
        $exceptionRenderer = require __DIR__ . "/../../../../configs/http/exceptions.php";
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
    protected function getGlobalMiddleware()
    {
        return require __DIR__ . "/../../../../configs/http/middleware.php";
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
         * Finish configuring the bootstrappers for the HTTP kernel
         * ----------------------------------------------------------
         *
         * @var ApplicationBinder $applicationBinder
         */
        $applicationBinder->bindToApplication(
            require __DIR__ . "/../../../../configs/http/bootstrappers.php",
            false,
            false
        );
    }
}