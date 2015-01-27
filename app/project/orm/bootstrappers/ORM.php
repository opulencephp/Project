<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the ORM bootstrapper
 */
namespace Project\ORM\Bootstrappers;
use RDev\Applications\Bootstrappers;
use RDev\Databases\SQL;
use RDev\ORM as RDevORM;
use RDev\IoC;

class ORM extends Bootstrappers\Bootstrapper
{
    /**
     * {@inheritdoc}
     */
    public function registerBindings(IoC\IContainer $container)
    {
        $container->bind("RDev\\ORM\\UnitOfWork", new RDevORM\UnitOfWork(new RDevORM\EntityRegistry()));
    }

    /**
     * Binds the SQL connection to a new unit of work
     *
     * @param RDevORM\UnitOfWork $unitOfWork The unit of work whose connection needs setting
     * @param SQL\ConnectionPool $connectionPool The SQL connection pool
     */
    public function run(RDevORM\UnitOfWork $unitOfWork, SQL\ConnectionPool $connectionPool)
    {
        $unitOfWork->setConnection($connectionPool->getWriteConnection());
    }
}