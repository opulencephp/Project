<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the SQL connection pool config
 */
use RDev\Applications\Environments\Environment;
use RDev\Databases\SQL\PDO\PostgreSQL\Driver;
use RDev\Databases\SQL\Server;
use RDev\Databases\SQL\SingleServerConnectionPool;

/**
 * ----------------------------------------------------------
 * Configure SQL for the correct environment
 * ----------------------------------------------------------
 *
 * @var Environment $environment
 */
return new SingleServerConnectionPool(
    new Driver(),
    new Server(
        $environment->getVariable("DB_HOST"),
        $environment->getVariable("DB_USER"),
        $environment->getVariable("DB_PASSWORD"),
        $environment->getVariable("DB_NAME"),
        $environment->getVariable("DB_PORT")
    )
);