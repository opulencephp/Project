<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the Redis bootstrapper
 */
namespace Project\Bootstrappers\Databases;
use RDev\Applications\Bootstrappers\Bootstrapper;
use RDev\Databases\NoSQL\Redis\RDevPHPRedis;
use RDev\Databases\NoSQL\Redis\Server;
use RDev\Databases\NoSQL\Redis\TypeMapper;
use RDev\IoC\IContainer;

class Redis extends Bootstrapper
{
    /**
     * {@inheritdoc}
     */
    public function registerBindings(IContainer $container)
    {
        $redis = new RDevPHPRedis(
            new Server(
                $this->environment->getVariable("REDIS_HOST"),
                $this->environment->getVariable("REDIS_PASSWORD"),
                $this->environment->getVariable("REDIS_PORT")
            ),
            new TypeMapper()
        );
        $container->bind("RDev\\Databases\\NoSQL\\Redis\\IRedis", $redis);
    }
}