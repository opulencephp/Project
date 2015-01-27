<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the router bootstrapper
 */
namespace Project\HTTP\Routing\Bootstrappers;
use RDev\Applications\Bootstrappers;
use RDev\HTTP\Routing;
use RDev\IoC;

class Router extends Bootstrappers\Bootstrapper
{
    /**
     * {@inheritdoc}
     */
    public function registerBindings(IoC\IContainer $container)
    {
        $router = $container->makeShared("RDev\\HTTP\\Routing\\Router");
        $router->setMissedRouteControllerName("Project\\HTTP\\Routing\\Controllers\\Page");
    }
}