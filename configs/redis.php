<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the Redis config
 */
use RDev\Databases\NoSQL\Redis\RDevPHPRedis;
use RDev\Databases\NoSQL\Redis\Server;
use RDev\Databases\NoSQL\Redis\TypeMapper;

// Choose the correct server for this environment
switch($environment->getName())
{
    case "development":
        return new RDevPHPRedis(
            new Server(
                "mydevserver",
                "mypassword",
                6379
            ),
            new TypeMapper()
        );
    default:
        return new RDevPHPRedis(
            new Server(
                "myproductionerver",
                "mypassword",
                6379
            ),
            new TypeMapper()
        );
}