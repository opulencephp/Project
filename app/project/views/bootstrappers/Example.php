<?php
/**
 * Copyright (C) 2014 David Young
 * 
 * Defines an example template bootstrapper
 */
namespace Project\Views\Bootstrappers;
use Project\Views\Builders;
use RDev\Applications\Bootstrappers;
use RDev\Views\Factories;

class Example extends Bootstrappers\Bootstrapper
{
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $container = $this->application->getIoCContainer();
        /** @var Factories\ITemplateFactory $factory */
        $factory = $container->makeShared("RDev\\Views\\Factories\\ITemplateFactory");
        $factory->registerBuilder("Example.html", function()
        {
            return new Builders\Example();
        });
    }
}