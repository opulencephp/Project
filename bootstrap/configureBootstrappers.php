<?php
/**
 * Configures bootstrappers for an application
 */
use RDev\Applications\Application;
use RDev\Applications\Bootstrappers\BootstrapperRegistry;
use RDev\Applications\Bootstrappers\IBootstrapperRegistry;
use RDev\Applications\Bootstrappers\IO\BootstrapperIO;
use RDev\Applications\Bootstrappers\Dispatchers\Dispatcher;
use RDev\Applications\Bootstrappers\Dispatchers\IDispatcher;

/**
 * Configures kernel-specific bootstrappers
 *
 * @param Application $application The application to configure the bootstrappers with
 * @param array $kernelBootstrappers Any bootstrappers specific to the kernel being loaded
 * @param bool $forceEagerLoading Whether or not to force eager loading of bootstrappers
 * @param bool $cache Whether or not to cache the bootstrapper settings
 * @param string $cachedRegistryFilePath The path to the cached registry file
 */
return function(Application $application, array $kernelBootstrappers, $forceEagerLoading, $cache, $cachedRegistryFilePath = "")
{
    $dispatcher = new Dispatcher($application);
    $dispatcher->forceEagerLoading($forceEagerLoading);
    $bootstrapperIO = new BootstrapperIO($application->getPaths(), $application->getEnvironment());

    // Register the kernel-agnostic bootstrappers first
    $registry = new BootstrapperRegistry($application->getPaths(), $application->getEnvironment());
    $registry->registerBootstrapperClasses(require $application->getPaths()["configs"] . "/bootstrappers.php");
    $registry->registerBootstrapperClasses($kernelBootstrappers);

    // Register to the container in case any application components need them
    $application->getIoCContainer()->bind(IDispatcher::class, $dispatcher);
    $application->getIoCContainer()->bind(BootstrapperIO::class, $bootstrapperIO);
    $application->getIoCContainer()->bind(IBootstrapperRegistry::class, $registry);

    // Register the task to dispatch the bootstrappers
    $application->registerPreStartTask(
        function () use ($cache, $cachedRegistryFilePath, $registry, $dispatcher, &$bootstrapperIO)
        {
            if($cache && !empty($cachedRegistryFilePath))
            {
                $bootstrapperIO->read($cachedRegistryFilePath, $registry);
            }
            else
            {
                $registry->setBootstrapperDetails();
            }

            $dispatcher->dispatch($registry);
        }
    );
};