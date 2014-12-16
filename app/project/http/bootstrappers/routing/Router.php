<?php
/**
 * Copyright (C) 2014 David Young
 * 
 * Defines the routing bootstrapper
 */
namespace Project\HTTP\Bootstrappers\Routing;
use RDev\Applications\Bootstrappers;
use RDev\IoC;
use RDev\Routing;
use RDev\Routing\Compilers;
use RDev\Routing\URL;

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
        $compiler = new Compilers\Compiler();
        $router = new Routing\Router(
            $dispatcher,
            $compiler,
            "Project\\HTTP\\Routing\\Controllers\\Page"
        );
        $urlGenerator = new URL\URLGenerator($router->getRoutes(), $compiler);
        $this->container->bind("RDev\\Routing\\URL\\URLGenerator", $urlGenerator);
        $this->container->bind("RDev\\Routing\\Router", $router);
        $this->container->bind("RDev\\Routing\\Compilers\\ICompiler", $compiler);
    }
}