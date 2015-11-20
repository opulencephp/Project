<?php
namespace Project\Console;

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
    public function setUp()
    {
        $paths = require __DIR__ . "/../../../../config/paths.php";
        $environment = require __DIR__ . "/../../../../config/environment.php";
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
}