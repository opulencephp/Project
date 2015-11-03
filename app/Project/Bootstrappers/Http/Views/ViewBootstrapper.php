<?php
namespace Project\Bootstrappers\Http\Views;

use Opulence\Framework\Bootstrappers\Http\Views\ViewBootstrapper as BaseBootstrapper;
use Opulence\Ioc\IContainer;
use Opulence\Views\Caching\FileCache;
use Opulence\Views\Caching\ICache;

/**
 * Defines the view bootstrapper
 */
class ViewBootstrapper extends BaseBootstrapper
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
        $cacheConfig = require_once "{$this->paths["configs.http"]}/views.php";

        return new FileCache(
            $this->paths["views.compiled"],
            $cacheConfig["cache.lifetime"],
            $cacheConfig["gc.chance"],
            $cacheConfig["gc.divisor"]
        );
    }
}