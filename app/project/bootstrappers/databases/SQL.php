<?php
/**
 * Defines the SQL bootstrapper
 */
namespace Project\Bootstrappers\Databases;
use RDev\Applications\Bootstrappers\Bootstrapper;
use RDev\Databases\PDO\PostgreSQL\Driver;
use RDev\Databases\Server;
use RDev\Databases\SingleServerConnectionPool;
use RDev\IoC\IContainer;

class SQL extends Bootstrapper
{
    /**
     * {@inheritdoc}
     */
    public function registerBindings(IContainer $container)
    {
        $connectionPool = new SingleServerConnectionPool(
            new Driver(),
            new Server(
                $this->environment->getVariable("DB_HOST"),
                $this->environment->getVariable("DB_USER"),
                $this->environment->getVariable("DB_PASSWORD"),
                $this->environment->getVariable("DB_NAME"),
                $this->environment->getVariable("DB_PORT")
            )
        );
        $container->bind("RDev\\Databases\\ConnectionPool", $connectionPool);
    }
}