<?php
use Opulence\Framework\Bootstrappers\Cryptography\CryptographyBootstrapper;
use Opulence\Framework\Bootstrappers\Php\PhpBootstrapper;
use Project\Bootstrappers\Databases\RedisBootstrapper;
use Project\Bootstrappers\Databases\SqlBootstrapper;
use Project\Bootstrappers\Events\DispatcherBootstrapper;
use Project\Bootstrappers\Orm\UnitOfWorkBootstrapper;

/**
 * ----------------------------------------------------------
 * Define the bootstrapper classes for all applications
 * ----------------------------------------------------------
 */
return [
    PhpBootstrapper::class,
    CryptographyBootstrapper::class,
    DispatcherBootstrapper::class,
    SqlBootstrapper::class,
    RedisBootstrapper::class,
    UnitOfWorkBootstrapper::class
];