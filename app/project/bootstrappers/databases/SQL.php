<?php
/**
 * Defines the SQL bootstrapper
 */
namespace Project\Bootstrappers\Databases;

use Opulence\Applications\Bootstrappers\Bootstrapper;
use Opulence\Applications\Bootstrappers\ILazyBootstrapper;
use Opulence\Databases\ConnectionPool;
use Opulence\Databases\PDO\PostgreSQL\Driver;
use Opulence\Databases\Server;
use Opulence\Databases\SingleServerConnectionPool;
use Opulence\IoC\IContainer;

class SQL extends Bootstrapper implements ILazyBootstrapper
{
    /**
     * @inheritdoc
     */
    public function getBindings()
    {
        return [ConnectionPool::class];
    }

    /**
     * @inheritdoc
     */
    public function registerBindings(IContainer $container)
    {
        $connectionPool = new SingleServerConnectionPool(
            new Driver(),
            new Server(
                $this->environment->getVar("DB_HOST"),
                $this->environment->getVar("DB_USER"),
                $this->environment->getVar("DB_PASSWORD"),
                $this->environment->getVar("DB_NAME"),
                $this->environment->getVar("DB_PORT")
            )
        );
        $container->bind(ConnectionPool::class, $connectionPool);
    }
}