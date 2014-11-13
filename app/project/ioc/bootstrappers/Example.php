<?php
/**
 * Copyright (C) 2014 David Young
 *
 * Defines the container bootstrapper
 */
namespace Project\IoC\Bootstrappers;
use RDev\Applications\Bootstrappers;

class Example extends Bootstrappers\Bootstrapper
{
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $container = $this->application->getIoCContainer();
        $container->bind("Monolog\\Logger", $this->application->getLogger());
        $container->bind("RDev\\Application\\Environment", $this->application->getEnvironment());
        $container->bind("RDev\\Session\\ISession", $this->application->getSession());
    }
}