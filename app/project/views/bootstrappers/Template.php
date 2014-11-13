<?php
/**
 * Copyright (C) 2014 David Young
 * 
 * Defines the template bootstrapper
 */
namespace Project\Views\Bootstrappers;
use Project\Views\Builders;
use RDev\Applications\Bootstrappers;
use RDev\IoC;
use RDev\Views\Cache;
use RDev\Views\Factories;

class Template implements Bootstrappers\IBootstrapper
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
        $this->container->bind("RDev\\Views\\Compilers\\ICompiler", "RDev\\Views\\Compilers\\Compiler");
        $this->container->bind("RDev\\Views\\Cache\\ICache", $cache);
        $templateFactory = $this->container->makeShared("RDev\\Views\\Factories\\TemplateFactory", [
            // The path to the template directory
            __DIR__ . "/../../../../views"
        ]);
        $this->container->bind("RDev\\Views\\Factories\\ITemplateFactory", $templateFactory);
        $templateFactory->registerBuilder("Example.html", function()
        {
            return new Builders\Example();
        });
    }
}