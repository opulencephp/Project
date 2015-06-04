<?php
/**
 * Defines the console application test case
 */
namespace Project\Console;
use Closure;
use RDev\Applications\Application;
use RDev\Framework\Tests\Console\ApplicationTestCase as BaseTestCase;

class ApplicationTestCase extends BaseTestCase
{
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
         * Setup the bootstrappers
         * ----------------------------------------------------------
         *
         * @var Closure $configureBootstrappers
         */
        $configureBootstrappers = require __DIR__ . "/../../../../bootstrap/configureBootstrappers.php";
        $configureBootstrappers(
            $this->application,
            require $application->getPaths()["configs"] . "/console/bootstrappers.php",
            false,
            false
        );
    }
}