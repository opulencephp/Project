<?php
namespace Project\Http;

use Opulence\Applications\Application;
use Opulence\Applications\Bootstrappers\ApplicationBinder;
use Opulence\Framework\Testing\PhpUnit\Http\ApplicationTestCase as BaseTestCase;

/**
 * Defines the Http application test case
 */
class ApplicationTestCase extends BaseTestCase
{
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
    protected function getKernelLogger()
    {
        return require __DIR__ . "/../../../../configs/http/logging.php";
    }

    /**
     * @inheritdoc
     */
    protected function setApplication()
    {
        /** @var Application $application */
        require __DIR__ . "/../../../../bootstrap/start.php";
        $this->application = $application;

        /**
         * ----------------------------------------------------------
         * Finish configuring the bootstrappers for the Http kernel
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