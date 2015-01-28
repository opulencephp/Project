<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the credentials bootstrapper
 */
namespace Project\Bootstrappers\Authentication;
use RDev\Applications\Bootstrappers;
use RDev\IoC;

class Credentials extends Bootstrappers\Bootstrapper
{
    /**
     * {@inheritdoc}
     */
    public function registerBindings(IoC\IContainer $container)
    {
        $container->bind(
            "RDev\\Authentication\\Credentials\\ICredentials",
            "RDev\\Authentication\\Credentials\\Credentials"
        );
        $container->bind("RDev\\Cryptography\\IHasher", "RDev\\Cryptography\\BCryptHasher");
    }
}