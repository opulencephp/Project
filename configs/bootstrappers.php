<?php
/**
 * Defines the list of bootstrapper classes to load
 */
use Project\Bootstrappers\Databases\SQL;
use Project\Bootstrappers\Events\Dispatcher;
use Project\Bootstrappers\ORM\UnitOfWork;
use Opulence\Framework\Bootstrappers\Cryptography\Cryptography;

return [
    Cryptography::class,
    Dispatcher::class,
    SQL::class,
    UnitOfWork::class
];