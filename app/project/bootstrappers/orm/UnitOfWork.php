<?php
/**
 * Defines the unit of work bootstrapper
 */
namespace Project\Bootstrappers\ORM;
use Opulence\Applications\Bootstrappers\Bootstrapper;
use Opulence\Applications\Bootstrappers\ILazyBootstrapper;
use Opulence\Databases\ConnectionPool;
use Opulence\IoC\IContainer;
use Opulence\ORM\EntityRegistry;
use Opulence\ORM\UnitOfWork as ORMUnitOfWork;

class UnitOfWork extends Bootstrapper implements ILazyBootstrapper
{
    /** @var ORMUnitOfWork */
    private $unitOfWork = null;

    /**
     * @inheritdoc
     */
    public function getBindings()
    {
        return [ORMUnitOfWork::class];
    }

    /**
     * @inheritdoc
     */
    public function registerBindings(IContainer $container)
    {
        $this->unitOfWork = new ORMUnitOfWork(new EntityRegistry());
        $container->bind(ORMUnitOfWork::class, $this->unitOfWork);
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