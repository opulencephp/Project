<?php
/**
 * Copyright (C) 2014 David Young
 * 
 * Defines an example template bootstrapper
 */
namespace Project\Views\Bootstrappers;
use Project\Views\Builders;
use RDev\Applications\Bootstrappers;
use RDev\Views\Cache;
use RDev\Views\Factories;

class Example extends Bootstrappers\Bootstrapper
{
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $container = $this->application->getIoCContainer();
        $cache = $container->makeShared("RDev\\Views\\Cache\\Cache", [
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
        $container->bind("RDev\\Views\\Compilers\\ICompiler", "RDev\\Views\\Compilers\\Compiler");
        $container->bind("RDev\\Views\\Cache\\ICache", $cache);
        $templateFactory = $container->makeShared("RDev\\Views\\Factories\\TemplateFactory", [
            // The path to the template directory
            __DIR__ . "/../../../../views"
        ]);
        $container->bind("RDev\\Views\\Factories\\ITemplateFactory", $templateFactory);
        $templateFactory->registerBuilder("Example.html", function()
        {
            return new Builders\Example();
        });
    }
}