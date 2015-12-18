<?php
use Opulence\Framework\Bootstrappers\Cryptography\CryptographyBootstrapper;
use Project\Bootstrappers\Cache\RedisBootstrapper;
use Project\Bootstrappers\Databases\SqlBootstrapper;
use Project\Bootstrappers\Events\DispatcherBootstrapper;
use Project\Bootstrappers\Orm\UnitOfWorkBootstrapper;
use Project\Bootstrappers\Validation\ValidatorBootstrapper;

/**
 * ----------------------------------------------------------
 * Define the bootstrapper classes for all applications
 * ----------------------------------------------------------
 */
return [
    CryptographyBootstrapper::class,
    DispatcherBootstrapper::class,
    SqlBootstrapper::class,
    RedisBootstrapper::class,
    UnitOfWorkBootstrapper::class,
    ValidatorBootstrapper::class
];