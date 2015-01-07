<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the command bootstrapper
 */
namespace Project\Console\Bootstrappers;
use RDev\Applications\Bootstrappers;
use RDev\Console\Commands\Compilers;
use RDev\IoC;

class Commands implements Bootstrappers\IBootstrapper
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
        $compiler = new Compilers\Compiler();
        $this->container->bind("RDev\\Console\\Commands\\Compilers\\ICompiler", $compiler);
    }
}