<?php
/**
 * Defines the router bootstrapper
 */
namespace Project\Bootstrappers\HTTP\Routing;

use Project\HTTP\Controllers\Page;
use Opulence\Applications\Environments\Environment;
use Opulence\Framework\Bootstrappers\HTTP\Routing\Router as BaseBootstrapper;
use Opulence\Routing\Router as HTTPRouter;
use Opulence\Routing\Routes\Caching\ICache;

class Router extends BaseBootstrapper
{
    /**
     * Configures the router, which is useful for things like caching
     *
     * @param HTTPRouter $router The router to configure
     */
    protected function configureRouter(HTTPRouter $router)
    {
        $router->setMissedRouteController(Page::class);
        $routingConfig = require "{$this->paths["configs.http"]}/routing.php";
        $routesConfigPath = "{$this->paths["configs.http"]}/routes.php";

        if($routingConfig["cache"] && $this->environment->getName() == Environment::PRODUCTION)
        {
            $cachedRoutesPath = "{$this->paths["routes.cache"]}/" . ICache::DEFAULT_CACHED_ROUTES_FILE_NAME;
            $routes = $this->cache->get($cachedRoutesPath, $router, $routesConfigPath);
            $router->setRouteCollection($routes);
        }
        else
        {
            require $routesConfigPath;
        }
    }
}