<?php
namespace Project\Application\Bootstrappers\Databases;

use Opulence\Databases\Adapters\Pdo\PostgreSql\Driver;
use Opulence\Databases\ConnectionPools\ConnectionPool;
use Opulence\Databases\ConnectionPools\SingleServerConnectionPool;
use Opulence\Databases\Providers\Types\Factories\TypeMapperFactory;
use Opulence\Databases\Server;
use Opulence\Ioc\Bootstrappers\Bootstrapper;
use Opulence\Ioc\Bootstrappers\ILazyBootstrapper;
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
                getenv("DB_HOST"),
                getenv("DB_USER"),
                getenv("DB_PASSWORD"),
                getenv("DB_NAME"),
                getenv("DB_PORT")
            )
        );
        $container->bindInstance(ConnectionPool::class, $connectionPool);
        $container->bindInstance(TypeMapperFactory::class, new TypeMapperFactory());
    }
}