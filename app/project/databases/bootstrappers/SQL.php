<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the SQL bootstrapper
 */
namespace Project\Databases\Bootstrappers;
use RDev\Applications\Bootstrappers;
use RDev\Databases\SQL as SQLDatabases;
use RDev\Databases\SQL\PDO\PostgreSQL;
use RDev\IoC;

class SQL extends Bootstrappers\Bootstrapper
{
    /**
     * {@inheritdoc}
     */
    public function registerBindings(IoC\IContainer $container)
    {
        switch($this->environment->getName())
        {
            case "development":
                $connectionPool = new SQLDatabases\SingleServerConnectionPool(
                    new PostgreSQL\Driver(),
                    new SQLDatabases\Server(
                        "mydevserver",
                        "myuser",
                        "mypassword",
                        "mydbname",
                        5432
                    )
                );

                break;
            default:
                $connectionPool = new SQLDatabases\SingleServerConnectionPool(
                    new PostgreSQL\Driver(),
                    new SQLDatabases\Server(
                        "myproductionserver",
                        "myuser",
                        "mypassword",
                        "mydbname",
                        5432
                    )
                );

                break;
        }

        $container->bind("RDev\\Databases\\SQL\\ConnectionPool", $connectionPool);
    }
}