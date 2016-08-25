<?php
namespace Project\Application\Bootstrappers\Orm;

use Opulence\Databases\ConnectionPools\ConnectionPool;
use Opulence\Ioc\Bootstrappers\Bootstrapper;
use Opulence\Ioc\Bootstrappers\ILazyBootstrapper;
use Opulence\Ioc\IContainer;
use Opulence\Orm\ChangeTracking\ChangeTracker;
use Opulence\Orm\ChangeTracking\IChangeTracker;
use Opulence\Orm\EntityRegistry;
use Opulence\Orm\Ids\Accessors\IdAccessorRegistry;
use Opulence\Orm\Ids\Accessors\IIdAccessorRegistry;
use Opulence\Orm\Ids\Generators\IdGeneratorRegistry;
use Opulence\Orm\Ids\Generators\IIdGeneratorRegistry;
use Opulence\Orm\IUnitOfWork;
use Opulence\Orm\UnitOfWork;

/**
 * Defines the unit of work bootstrapper
 */
class UnitOfWorkBootstrapper extends Bootstrapper implements ILazyBootstrapper
{
    /** @var IUnitOfWork */
    private $unitOfWork = null;

    /**
     * @inheritdoc
     */
    public function getBindings() : array
    {
        return [
            IChangeTracker::class,
            IIdAccessorRegistry::class,
            IIdGeneratorRegistry::class,
            IUnitOfWork::class
        ];
    }

    /**
     * @inheritdoc
     */
    public function registerBindings(IContainer $container)
    {
        $idAccessorRegistry = new IdAccessorRegistry();
        $idGeneratorRegistry = new IdGeneratorRegistry();
        $this->registerIdAccessors($idAccessorRegistry);
        $this->registerIdGenerators($idGeneratorRegistry);
        $changeTracker = new ChangeTracker();
        $entityRegistry = new EntityRegistry($idAccessorRegistry, $changeTracker);
        $this->unitOfWork = new UnitOfWork($entityRegistry, $idAccessorRegistry, $idGeneratorRegistry, $changeTracker);
        $container->bindInstance(IIdAccessorRegistry::class, $idAccessorRegistry);
        $container->bindInstance(IIdGeneratorRegistry::class, $idGeneratorRegistry);
        $container->bindInstance(IChangeTracker::class, $changeTracker);
        $container->bindInstance(IUnitOfWork::class, $this->unitOfWork);
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

    /**
     * Registers Id getters/setters for classes managed by the unit of work
     *
     * @param IIdAccessorRegistry $idAccessorRegistry The Id accessor registry
     */
    private function registerIdAccessors(IIdAccessorRegistry $idAccessorRegistry)
    {
        // Register your Id getters/setters for classes that will be managed by the unit of work
    }

    /**
     * Registers Id generators for classes managed by the unit of work
     *
     * @param IIdGeneratorRegistry $idGeneratorRegistry The Id generator registry
     */
    private function registerIdGenerators(IIdGeneratorRegistry $idGeneratorRegistry)
    {
        // Register your Id generators for classes that will be managed by the unit of work
    }
}