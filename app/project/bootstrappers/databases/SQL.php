<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the SQL bootstrapper
 */
namespace Project\Bootstrappers\Databases;
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
        $connectionPool = new SQLDatabases\SingleServerConnectionPool(
            new PostgreSQL\Driver(),
            new SQLDatabases\Server(
                $this->environment->getVariable("DB_HOST"),
                $this->environment->getVariable("DB_USER"),
                $this->environment->getVariable("DB_PASSWORD"),
                $this->environment->getVariable("DB_NAME"),
                $this->environment->getVariable("DB_PORT")
            )
        );
        $container->bind("RDev\\Databases\\SQL\\ConnectionPool", $connectionPool);
    }
}