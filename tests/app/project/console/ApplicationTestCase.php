<?php
/**
 * Defines the console application test case
 */
namespace Project\Console;
use RDev\Applications\Application;
use RDev\Applications\Bootstrappers\ApplicationBinder;
use RDev\Framework\Tests\Console\ApplicationTestCase as BaseTestCase;

class ApplicationTestCase extends BaseTestCase
{
    /**
     * {@inheritdoc}
     */
    protected function getKernelLogger()
    {
        return require __DIR__ . "/../../../../configs/console/logging.php";
    }

    /**
     * {@inheritdoc}
     */
    protected function setApplication()
    {
        /** @var Application $application */
        require __DIR__ . "/../../../../bootstrap/start.php";
        $this->application = $application;

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