<?php
namespace Project\Application\Bootstrappers\Orm;

use Opulence\Databases\IConnection;
use Opulence\Ioc\Bootstrappers\LazyBootstrapper;
use Opulence\Ioc\IContainer;
use Opulence\Ioc\IocException;
use Opulence\Orm\ChangeTracking\ChangeTracker;
use Opulence\Orm\ChangeTracking\IChangeTracker;
use Opulence\Orm\EntityRegistry;
use Opulence\Orm\Ids\Accessors\IdAccessorRegistry;
use Opulence\Orm\Ids\Accessors\IIdAccessorRegistry;
use Opulence\Orm\Ids\Generators\IdGeneratorRegistry;
use Opulence\Orm\Ids\Generators\IIdGeneratorRegistry;
use Opulence\Orm\IUnitOfWork;
use Opulence\Orm\UnitOfWork;
use RuntimeException;

/**
 * Defines the ORM bootstrapper
 */
class OrmBootstrapper extends LazyBootstrapper
{
    /**
     * @inheritdoc
     */
    public function getBindings() : array
    {
        return [
            IChangeTracker::class,
            IIdAccessorRegistry::class,
            IIdGeneratorRegistry::class,
            IUnitOfWork::class,
            // Add your repository classes here
        ];
    }

    /**
     * @inheritdoc
     */
    public function registerBindings(IContainer $container) : void
    {
        try {
            $idAccessorRegistry = new IdAccessorRegistry();
            $idGeneratorRegistry = new IdGeneratorRegistry();
            $this->registerIdAccessors($idAccessorRegistry);
            $this->registerIdGenerators($idGeneratorRegistry);
            $changeTracker = new ChangeTracker();
            $entityRegistry = new EntityRegistry($idAccessorRegistry, $changeTracker);
            $unitOfWork = new UnitOfWork(
                $entityRegistry,
                $idAccessorRegistry,
                $idGeneratorRegistry,
                $changeTracker,
                $container->resolve(IConnection::class)
            );
            $this->bindRepositories($container, $unitOfWork);
            $container->bindInstance(IIdAccessorRegistry::class, $idAccessorRegistry);
            $container->bindInstance(IIdGeneratorRegistry::class, $idGeneratorRegistry);
            $container->bindInstance(IChangeTracker::class, $changeTracker);
            $container->bindInstance(IUnitOfWork::class, $unitOfWork);
        } catch (IocException $ex) {
            throw new RuntimeException('Failed to register ORM bindings', 0, $ex);
        }
    }

    /**
     * Binds repositories to the container
     *
     * @param IContainer $container The container to bind to
     * @param IUnitOfWork $unitOfWork The unit of work to use in repositories
     */
    private function bindRepositories(IContainer $container, IUnitOfWork $unitOfWork) : void
    {
        // Bind your repositories here
    }

    /**
     * Registers Id getters/setters for classes managed by the unit of work
     *
     * @param IIdAccessorRegistry $idAccessorRegistry The Id accessor registry
     */
    private function registerIdAccessors(IIdAccessorRegistry $idAccessorRegistry) : void
    {
        // Register your Id getters/setters for classes that will be managed by the unit of work
    }

    /**
     * Registers Id generators for classes managed by the unit of work
     *
     * @param IIdGeneratorRegistry $idGeneratorRegistry The Id generator registry
     */
    private function registerIdGenerators(IIdGeneratorRegistry $idGeneratorRegistry) : void
    {
        // Register your Id generators for classes that will be managed by the unit of work
    }
}
