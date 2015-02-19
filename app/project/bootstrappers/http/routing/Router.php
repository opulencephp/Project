<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the router bootstrapper
 */
namespace Project\Bootstrappers\HTTP\Routing;
use RDev\Applications\Bootstrappers;
use RDev\HTTP\Routing;

class Router extends Bootstrappers\Bootstrapper
{
    /**
     * Sets the missed route controller
     *
     * @param Routing\Router $router The router to set the missed route controller on
     */
    public function run(Routing\Router $router)
    {
        $router->setMissedRouteControllerName("Project\\HTTP\\Controllers\\Page");
    }
}