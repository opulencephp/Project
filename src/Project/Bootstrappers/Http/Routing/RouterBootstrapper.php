<?php
namespace Project\Bootstrappers\Http\Routing;

use Opulence\Applications\Environments\Environment;
use Opulence\Framework\Bootstrappers\Http\Routing\RouterBootstrapper as BaseBootstrapper;
use Opulence\Routing\Router;
use Opulence\Routing\Routes\Caching\ICache;

/**
 * Defines the router bootstrapper
 */
class RouterBootstrapper extends BaseBootstrapper
{
    /**
     * Configures the router, which is useful for things like caching
     *
     * @param Router $router The router to configure
     */
    protected function configureRouter(Router $router)
    {
        $routingConfig = require "{$this->paths["config.http"]}/routing.php";
        $routesConfigPath = "{$this->paths["config.http"]}/routes.php";

        if ($routingConfig["cache"] && $this->environment->getName() == Environment::PRODUCTION) {
            $cachedRoutesPath = "{$this->paths["routes.cache"]}/" . ICache::DEFAULT_CACHED_ROUTES_FILE_NAME;
            $routes = $this->cache->get($cachedRoutesPath, $router, $routesConfigPath);
            $router->setRouteCollection($routes);
        } else {
            require $routesConfigPath;
        }
    }
}