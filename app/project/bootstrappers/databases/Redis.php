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
        $redis = new RedisDatabases\RDevPHPRedis(
            new RedisDatabases\Server(
                $this->environment->getVariable("REDIS_HOST"),
                $this->environment->getVariable("REDIS_PASSWORD"),
                $this->environment->getVariable("REDIS_PORT")
            ),
            new RedisDatabases\TypeMapper()
        );
        $container->bind("RDev\\Databases\\NoSQL\\Redis\\IRedis", $redis);
    }
}