<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the Redis bootstrapper
 */
namespace Project\Databases\Bootstrappers;
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
        switch($this->environment->getName())
        {
            case "development":
                $redis = new RedisDatabases\RDevPHPRedis(
                    new RedisDatabases\Server(
                        "mydevserver",
                        "mypassword",
                        6379
                    ),
                    new RedisDatabases\TypeMapper()
                );

                break;
            default:
                $redis = new RedisDatabases\RDevPHPRedis(
                    new RedisDatabases\Server(
                        "myproductionerver",
                        "mypassword",
                        6379
                    ),
                    new RedisDatabases\TypeMapper()
                );

                break;
        }

        $container->bind("RDev\\Databases\\NoSQL\\Redis\\IRedis", $redis);
    }
}