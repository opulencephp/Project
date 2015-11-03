<?php
namespace Project\Bootstrappers\Orm;

use Opulence\Applications\Bootstrappers\Bootstrapper;
use Opulence\Applications\Bootstrappers\ILazyBootstrapper;
use Opulence\Databases\ConnectionPools\ConnectionPool;
use Opulence\Ioc\IContainer;
use Opulence\Orm\ChangeTracking\ChangeTracker;
use Opulence\Orm\ChangeTracking\IChangeTracker;
use Opulence\Orm\EntityRegistry;
use Opulence\Orm\Ids\IdAccessorRegistry;
use Opulence\Orm\Ids\IIdAccessorRegistry;
use Opulence\Orm\UnitOfWork;

/**
 * Defines the unit of work bootstrapper
 */
class UnitOfWorkBootstrapper extends Bootstrapper implements ILazyBootstrapper
{
    /** @var UnitOfWork */
    private $unitOfWork = null;

    /**
     * @inheritdoc
     */
    public function getBindings()
    {
        return [
            IChangeTracker::class,
            IIdAccessorRegistry::class,
            UnitOfWork::class
        ];
    }

    /**
     * @inheritdoc
     */
    public function registerBindings(IContainer $container)
    {
        $idAccessorRegistry = new IdAccessorRegistry();
        $changeTracker = new ChangeTracker();
        $entityRegistry = new EntityRegistry($idAccessorRegistry, $changeTracker);
        $this->unitOfWork = new UnitOfWork($entityRegistry, $idAccessorRegistry, $changeTracker);
        $container->bind(IIdAccessorRegistry::class, $idAccessorRegistry);
        $container->bind(IChangeTracker::class, $changeTracker);
        $container->bind(UnitOfWork::class, $this->unitOfWork);
    }

    /**
     * Binds the SQL connection to a new unit of work
     *
     * @param ConnectionPool $connectionPool The SQL connection pool
     */
    public function run(ConnectionPool $connectionPool)
    {
        $this->unitOfWork->setConnection($connectionPool->getWriteConnection());
    }
}