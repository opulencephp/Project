<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the template bootstrapper
 */
namespace Project\Bootstrappers\HTTP\Views;
use RDev\Files\FileSystem;
use RDev\Framework\Bootstrappers\HTTP\Views\Template as BaseTemplate;
use RDev\IoC\IContainer;
use RDev\Views\Caching\Cache;
use RDev\Views\Caching\ICache;

class Template extends BaseTemplate
{
    /**
     * Gets the view cache
     * To use a different view cache than the one returned here, extend this class and override this method
     *
     * @param IContainer $container The dependency injection container
     * @return ICache The view cache
     */
    protected function getViewCache(IContainer $container)
    {
        $fileSystem = $container->makeShared(FileSystem::class);
        $cacheConfig = require_once $this->paths["configs"] . "/http/views.php";

        return new Cache(
            $fileSystem,
            $this->paths["compiledViews"],
            $cacheConfig["cache.lifetime"],
            $cacheConfig["gc.chance"],
            $cacheConfig["gc.divisor"]
        );
    }
    
}