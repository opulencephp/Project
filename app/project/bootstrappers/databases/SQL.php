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
        // Set the environment variable for the SQL config
        $environment = $this->environment;
        $connectionPool = require_once $this->paths["configs"] . "/sql.php";
        $container->bind("RDev\\Databases\\SQL\\ConnectionPool", $connectionPool);
    }
}