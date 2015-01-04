<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the credentials bootstrapper
 */
namespace Project\Bootstrappers\Authentication;
use RDev\Applications\Bootstrappers;
use RDev\IoC;

class Credentials implements Bootstrappers\IBootstrapper
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
        $this->container->bind(
            "RDev\\Authentication\\Credentials\\ICredentials",
            "RDev\\Authentication\\Credentials\\Credentials"
        );
        $this->container->bind("RDev\\Cryptography\\IHasher", "RDev\\Cryptography\\BCryptHasher");
    }
}