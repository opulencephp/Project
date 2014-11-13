<?php
/**
 * Copyright (C) 2014 David Young
 * 
 * Defines an example authentication bootstrapper
 */
namespace Project\Authentication\Bootstrappers;
use RDev\Applications\Bootstrappers;

class Example extends Bootstrappers\Bootstrapper
{
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $container = $this->application->getIoCContainer();
        $container->bind(
            "RDev\\Authentication\\Credentials\\ICredentials",
            "RDev\\Authentication\\Credentials\\Credentials"
        );
        $container->bind("RDev\\Cryptography\\IHasher", "RDev\\Cryptography\\BCryptHasher");
    }
}