<?php
/**
 * Defines the console application test case
 */
namespace Project\Console;
use RDev\Applications\Application;
use RDev\Applications\Bootstrappers\Dispatchers\IDispatcher;
use RDev\Applications\Bootstrappers\IO\BootstrapperIO;
use RDev\Framework\Tests\Console\ApplicationTestCase as BaseTestCase;

class ApplicationTestCase extends BaseTestCase
{
    /**
     * {@inheritdoc}
     */
    protected function setApplication()
    {
        /** @var Application $application */
        /** @var BootstrapperIO $bootstrapperIO */
        /** @var IDispatcher $bootstrapperDispatcher */
        require __DIR__ . "/../../../../bootstrap/start.php";
        $consoleBootstrapperClasses = require $application->getPaths()["configs"] . "/console/bootstrappers.php";
        $bootstrapperIO->registerBootstrapperClasses($consoleBootstrapperClasses);
        $application->registerPreStartTask(function() use ($bootstrapperDispatcher, &$bootstrapperIO)
        {
            $bootstrapperDispatcher->dispatch(
                $bootstrapperIO->read(BootstrapperIO::CACHED_CONSOLE_BOOTSTRAPPER_REGISTRY_FILE_NAME)
            );
        });
        $this->application = $application;
    }
}