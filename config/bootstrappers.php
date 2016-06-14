<?php
use Opulence\Framework\Bootstrappers\Cryptography\CryptographyBootstrapper;
use Project\Application\Bootstrappers\Cache\RedisBootstrapper;
use Project\Application\Bootstrappers\Databases\SqlBootstrapper;
use Project\Application\Bootstrappers\Events\DispatcherBootstrapper;
use Project\Application\Bootstrappers\Orm\UnitOfWorkBootstrapper;
use Project\Application\Bootstrappers\Validation\ValidatorBootstrapper;

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