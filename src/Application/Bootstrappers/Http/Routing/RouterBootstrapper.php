<?php
namespace Project\Application\Bootstrappers\Http\Routing;

use Opulence\Environments\Environment;
use Opulence\Framework\Configuration\Config;
use Opulence\Framework\Routing\Bootstrappers\RouterBootstrapper as BaseBootstrapper;
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
    protected function configureRouter(Router $router) : void
    {
        $httpConfigPath = Config::get('paths', 'config.http');
        $routingConfig = require "$httpConfigPath/routing.php";
        $routesConfigPath = "$httpConfigPath/routes.php";

        if ($routingConfig['cache'] && getenv('ENV_NAME') === Environment::PRODUCTION) {
            $cachedRoutesPath = Config::get('paths', 'routes.cache') . '/' . ICache::DEFAULT_CACHED_ROUTES_FILE_NAME;
            $routes = $this->cache->get($cachedRoutesPath, $router, $routesConfigPath);
            $router->setRouteCollection($routes);
        } else {
            require $routesConfigPath;
        }
    }
}
