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
use RDev\Routing\Compilers as RoutingCompilers;
use RDev\Routing\URL;
use RDev\Views\Compilers as ViewCompilers;

class Router implements Bootstrappers\IBootstrapper
{
    /** @var IoC\IContainer The dependency injection container to use */
    private $container = null;
    /** @var ViewCompilers\ICompiler The view compiler used by this application */
    private $viewCompiler = null;
    /** @var URL\URLGenerator The URL generator used by this application */
    private $urlGenerator = null;

    /**
     * @param IoC\IContainer $container The dependency injection container to use
     * @param ViewCompilers\ICompiler $viewCompiler The view compiler used by this application
     * @param URL\URLGenerator $urlGenerator The URL generator used by this application
     */
    public function __construct(
        IoC\IContainer $container,
        ViewCompilers\ICompiler $viewCompiler,
        URL\URLGenerator $urlGenerator
    )
    {
        $this->container = $container;
        $this->viewCompiler = $viewCompiler;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $dispatcher = new Routing\Dispatcher($this->container);
        $compiler = new RoutingCompilers\Compiler();
        $router = new Routing\Router(
            $dispatcher,
            $compiler,
            "Project\\Routing\\Controllers\\Example"
        );
        $this->container->bind("RDev\\Routing\\Router", $router);
        $this->viewCompiler->registerTemplateFunction("namedRouteURL", function($routeName, $arguments = [])
        {
            return $this->urlGenerator->createFromName($routeName, $arguments);
        });
    }
}