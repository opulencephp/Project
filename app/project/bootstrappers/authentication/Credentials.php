<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the credentials bootstrapper
 */
namespace Project\Bootstrappers\Authentication;
use RDev\Applications\Bootstrappers\Bootstrapper;
use RDev\IoC\IContainer;

class Credentials extends Bootstrapper
{
    /**
     * {@inheritdoc}
     */
    public function registerBindings(IContainer $container)
    {
        $container->bind(
            "RDev\\Authentication\\Credentials\\ICredentials",
            "RDev\\Authentication\\Credentials\\Credentials"
        );
        $container->bind("RDev\\Cryptography\\IHasher", "RDev\\Cryptography\\BCryptHasher");
    }
}