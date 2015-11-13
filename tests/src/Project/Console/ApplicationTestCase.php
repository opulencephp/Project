<?php
namespace Project\Console;

use Opulence\Applications\Application;
use Opulence\Bootstrappers\ApplicationBinder;
use Opulence\Framework\Testing\PhpUnit\Console\ApplicationTestCase as BaseTestCase;
use Opulence\Ioc\IContainer;

/**
 * Defines the console application test case
 */
class ApplicationTestCase extends BaseTestCase
{
    /**
     * @inheritdoc
     */
    protected function getKernelLogger()
    {
        return require __DIR__ . "/../../../../configs/console/logging.php";
    }

    /**
     * @inheritdoc
     */
    protected function setApplicationAndIocContainer()
    {
        /** @var Application $application */
        require __DIR__ . "/../../../../bootstrap/start.php";
        $this->application = $application;
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