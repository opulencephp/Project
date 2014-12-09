<?php
/**
 * Copyright (C) 2014 David Young
 * 
 * Defines the template bootstrapper
 */
namespace Project\Views\Bootstrappers;
use Project\Views\Builders;
use RDev\Applications\Bootstrappers;
use RDev\Applications\Environments;
use RDev\IoC;
use RDev\Views\Cache;
use RDev\Views\Compilers;
use RDev\Views\Factories;

class Template implements Bootstrappers\IBootstrapper
{
    /** @var IoC\IContainer The dependency injection container to use */
    private $container = null;
    /** @var Environments\Environment The application environment */
    private $environment = null;

    /**
     * @param IoC\IContainer $container The dependency injection container to use
     * @param Environments\Environment $environment The application environment
     */
    public function __construct(IoC\IContainer $container, Environments\Environment $environment)
    {
        $this->container = $container;
        $this->environment = $environment;
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        /** @var Cache\Cache $cache */
        $cache = $this->container->makeShared("RDev\\Views\\Cache\\Cache", [
            // The path to store compiled templates
            // Make sure this path is writable
            __DIR__ . "/../../../../views/compiled",
            // The lifetime of cached templates
            3600,
            // The chance that garbage collection will be run
            1,
            // The number the chance will be divided by to calculate the probability (default is 1 in 100 chance)
            100
        ]);
        /**
         * Register any template functions or compilers here
         */
        $compiler = new Compilers\Compiler($cache);
        $templateFactory = $this->container->makeShared("RDev\\Views\\Factories\\TemplateFactory", [
            // The path to the template directory
            __DIR__ . "/../../../../views"
        ]);
        /**
         * Register any builders here
         */
        $templateFactory->registerBuilder("Example.html", function()
        {
            return new Builders\Example();
        });
        $this->container->bind("RDev\\Views\\Cache\\ICache", $cache);
        $this->container->bind("RDev\\Views\\Compilers\\ICompiler", $compiler);
        $this->container->bind("RDev\\Views\\Factories\\ITemplateFactory", $templateFactory);

        // If we're developing, wipe out the view cache
        if($this->environment->getName() == Environments\Environment::DEVELOPMENT)
        {
            $cache->flush();
        }
    }
}