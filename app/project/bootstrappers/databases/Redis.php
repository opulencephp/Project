<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the Redis bootstrapper
 */
namespace Project\Bootstrappers\Databases;
use RDev\Applications\Bootstrappers;
use RDev\Databases\NoSQL\Redis as RedisDatabases;
use RDev\IoC;

class Redis extends Bootstrappers\Bootstrapper
{
    /**
     * {@inheritdoc}
     */
    public function registerBindings(IoC\IContainer $container)
    {
        // Set the environment variable for the Redis config
        $environment = $this->environment;
        $redis = require_once $this->paths["configs"] . "/redis.php";
        $container->bind("RDev\\Databases\\NoSQL\\Redis\\IRedis", $redis);
    }
}