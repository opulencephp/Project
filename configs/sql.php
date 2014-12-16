<?php
/**
 * Copyright (C) 2014 David Young
 * 
 * Defines the SQL connection pool config
 */
use RDev\Databases\SQL\Server;
use RDev\Databases\SQL\SingleServerConnectionPool;
use RDev\Databases\SQL\PDO\PostgreSQL\Driver;

// Choose the correct server for this environment
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