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
use RDev\Routing\Compilers\Parsers;
use RDev\Routing\Dispatchers;
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
        $dispatcher = new Dispatchers\Dispatcher($this->container);
        $parser = new Parsers\Parser();
        $compiler = new Compilers\Compiler($parser);
        $router = new Routing\Router(
            $dispatcher,
            $compiler,
            "Project\\HTTP\\Controllers\\Page"
        );
        $urlGenerator = new URL\URLGenerator($router->getRoutes(), $parser);
        $this->container->bind("RDev\\Routing\\URL\\URLGenerator", $urlGenerator);
        $this->container->bind("RDev\\Routing\\Router", $router);
        $this->container->bind("RDev\\Routing\\Compilers\\ICompiler", $compiler);
    }
}