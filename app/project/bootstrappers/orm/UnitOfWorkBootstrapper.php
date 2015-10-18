<?php
/**
 * Defines the unit of work bootstrapper
 */
namespace Project\Bootstrappers\ORM;

use Opulence\Applications\Bootstrappers\Bootstrapper;
use Opulence\Applications\Bootstrappers\ILazyBootstrapper;
use Opulence\Databases\ConnectionPool;
use Opulence\IoC\IContainer;
use Opulence\ORM\ChangeTracking\ChangeTracker;
use Opulence\ORM\ChangeTracking\IChangeTracker;
use Opulence\ORM\EntityRegistry;
use Opulence\ORM\Ids\IdAccessorRegistry;
use Opulence\ORM\Ids\IIdAccessorRegistry;
use Opulence\ORM\UnitOfWork;

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