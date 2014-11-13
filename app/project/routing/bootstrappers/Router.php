<?php
/**
 * Copyright (C) 2014 David Young
 * 
 * Defines the routing bootstrapper
 */
namespace Project\Routing\Bootstrappers;
use RDev\Applications\Bootstrappers;
use RDev\IoC;
use RDev\Routing;

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
        $dispatcher = new Routing\Dispatcher($this->container);
        $compiler = new Routing\RouteCompiler();
        $router = new Routing\Router(
            $dispatcher,
            $compiler,
            "Project\\Routing\\Controllers\\Example"
        );
        $this->container->bind("RDev\\Routing\\Router", $router);
    }
}