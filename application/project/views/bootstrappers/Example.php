<?php
/**
 * Copyright (C) 2014 David Young
 * 
 * Defines an example template bootstrapper
 */
namespace Project\Views\Bootstrappers;
use Project\Views\Builders;
use RDev\Applications\Bootstrappers;
use RDev\Views;

class Example extends Bootstrappers\Bootstrapper
{
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $container = $this->application->getIoCContainer();
        /** @var Views\IFactory $factory */
        $factory = $container->makeShared("RDev\\Views\\IFactory");
        $factory->registerBuilder("Example.html", new Builders\Example());
    }
}