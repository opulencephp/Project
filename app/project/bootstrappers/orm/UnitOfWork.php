<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the unit of work bootstrapper
 */
namespace Project\Bootstrappers\ORM;
use RDev\Applications\Bootstrappers\Bootstrapper;
use RDev\Databases\SQL\ConnectionPool;
use RDev\IoC\IContainer;
use RDev\ORM\EntityRegistry;
use RDev\ORM\UnitOfWork as ORMUnitOfWork;

class UnitOfWork extends Bootstrapper
{
    /** @var ORMUnitOfWork */
    private $unitOfWork = null;

    /**
     * {@inheritdoc}
     */
    public function registerBindings(IContainer $container)
    {
        $this->unitOfWork = new ORMUnitOfWork(new EntityRegistry());
        $container->bind("RDev\\ORM\\UnitOfWork", $this->unitOfWork);
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