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

class Router implements Bootstrappers\IBootstrapper
{
    /** @var IoC\IContainer The dependency injection container to use */
    private $container = null;

    /**
     * @param IoC\IContainer $container The dependency injection container to use
     */
    public function __construct(IoC\IContainer $container)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $router = $this->container->makeShared("RDev\\HTTP\\Routing\\Router");
        $router->setMissedRouteControllerName("Project\\HTTP\\Routing\\Controllers\\Page");
    }
}