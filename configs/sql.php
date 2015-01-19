<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the SQL connection pool config
 */
use RDev\Databases\SQL\PDO\PostgreSQL\Driver;
use RDev\Databases\SQL\Server;
use RDev\Databases\SQL\SingleServerConnectionPool;

/**
 * ----------------------------------------------------------
 * Configure SQL for the correct environment
 * ----------------------------------------------------------
 */
switch($environment->getName())
{
    case "development":
        return new SingleServerConnectionPool(
            new Driver(),
            new Server(
                "mydevserver",
                "myuser",
                "mypassword",
                "mydbname",
                5432
            )
        );
    default:
        return new SingleServerConnectionPool(
            new Driver(),
            new Server(
                "myproductionserver",
                "myuser",
                "mypassword",
                "mydbname",
                5432
            )
        );
}