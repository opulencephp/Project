<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the unit of work bootstrapper
 */
namespace Project\Bootstrappers\ORM;
use RDev\Applications\Bootstrappers;
use RDev\Databases\SQL;
use RDev\IoC;
use RDev\ORM as RDevORM;

class UnitOfWork extends Bootstrappers\Bootstrapper
{
    /** @var RDevORM\UnitOfWork */
    private $unitOfWork = null;

    /**
     * {@inheritdoc}
     */
    public function registerBindings(IoC\IContainer $container)
    {
        $this->unitOfWork = new RDevORM\UnitOfWork(new RDevORM\EntityRegistry());
        $container->bind("RDev\\ORM\\UnitOfWork", $this->unitOfWork);
    }

    /**
     * Binds the SQL connection to a new unit of work
     *
     * @param SQL\ConnectionPool $connectionPool The SQL connection pool
     */
    public function run(SQL\ConnectionPool $connectionPool)
    {
        $this->unitOfWork->setConnection($connectionPool->getWriteConnection());
    }
}