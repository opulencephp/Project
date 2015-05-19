<?php
/**
 * Defines the router bootstrapper
 */
namespace Project\Bootstrappers\HTTP\Routing;
use RDev\Applications\Bootstrappers\Bootstrapper;
use RDev\Routing\Router as HTTPRouter;

class Router extends Bootstrapper
{
    /**
     * Sets the missed route controller
     *
     * @param HTTPRouter $router The router to set the missed route controller on
     */
    public function run(HTTPRouter $router)
    {
        $router->setMissedRouteController("Project\\HTTP\\Controllers\\Page");
        require $this->paths["configs"] . "/http/routing.php";
    }
}