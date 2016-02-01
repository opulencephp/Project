<?php
namespace Project\Bootstrappers\Databases;

use Opulence\Bootstrappers\Bootstrapper;
use Opulence\Bootstrappers\ILazyBootstrapper;
use Opulence\Databases\Adapters\Pdo\PostgreSql\Driver;
use Opulence\Databases\ConnectionPools\ConnectionPool;
use Opulence\Databases\ConnectionPools\SingleServerConnectionPool;
use Opulence\Databases\Providers\Types\Factories\TypeMapperFactory;
use Opulence\Databases\Server;
use Opulence\Ioc\IContainer;

/**
 * Defines the SQL bootstrapper
 */
class SqlBootstrapper extends Bootstrapper implements ILazyBootstrapper
{
    /**
     * @inheritdoc
     */
    public function getBindings() : array
    {
        return [ConnectionPool::class, TypeMapperFactory::class];
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
        $container->bind(TypeMapperFactory::class, new TypeMapperFactory());
    }
}