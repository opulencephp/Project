<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the Redis config
 */
use RDev\Applications\Environments\Environment;
use RDev\Databases\NoSQL\Redis\RDevPHPRedis;
use RDev\Databases\NoSQL\Redis\Server;
use RDev\Databases\NoSQL\Redis\TypeMapper;

/**
 * ----------------------------------------------------------
 * Configure Redis for the correct environment
 * ----------------------------------------------------------
 *
 * @var Environment $environment
 */
return new RDevPHPRedis(
    new Server(
        $environment->getVariable("REDIS_HOST"),
        $environment->getVariable("REDIS_PASSWORD"),
        $environment->getVariable("REDIS_PORT")
    ),
    new TypeMapper()
);