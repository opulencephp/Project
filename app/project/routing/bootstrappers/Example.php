<?php
/**
 * Copyright (C) 2014 David Young
 * 
 * Defines the routing bootstrapper
 */
namespace Project\Routing\Bootstrappers;
use RDev\Applications\Bootstrappers;
use RDev\Routing;

class Example extends Bootstrappers\Bootstrapper
{
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $container = $this->application->getIoCContainer();
        $dispatcher = new Routing\Dispatcher($container);
        $compiler = new Routing\RouteCompiler();
        $router = new Routing\Router(
            $dispatcher,
            $compiler,
            "Project\\Routing\\Controllers\\Example"
        );
        $container->bind("RDev\\Routing\\Router", $router);
    }
}