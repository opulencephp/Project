<?php
use Project\Bootstrappers\Databases\RedisBootstrapper;
use Project\Bootstrappers\Databases\SqlBootstrapper;
use Project\Bootstrappers\Events\DispatcherBootstrapper;
use Project\Bootstrappers\ORM\UnitOfWorkBootstrapper;
use Opulence\Framework\Bootstrappers\Cryptography\CryptographyBootstrapper;
use Opulence\Framework\Bootstrappers\PHP\PHPBootstrapper;

/**
 * ----------------------------------------------------------
 * Define the bootstrapper classes for all applications
 * ----------------------------------------------------------
 */
return [
    PHPBootstrapper::class,
    CryptographyBootstrapper::class,
    DispatcherBootstrapper::class,
    SqlBootstrapper::class,
    RedisBootstrapper::class,
    UnitOfWorkBootstrapper::class
];