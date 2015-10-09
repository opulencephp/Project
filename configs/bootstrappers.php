<?php
/**
 * Defines the list of bootstrapper classes to load
 */
use Project\Bootstrappers\Databases\SQLBootstrapper;
use Project\Bootstrappers\Events\DispatcherBootstrapper;
use Project\Bootstrappers\ORM\UnitOfWorkBootstrapper;
use Opulence\Framework\Bootstrappers\Cryptography\CryptographyBootstrapper;
use Opulence\Framework\Bootstrappers\PHP\PHPBootstrapper;

return [
    PHPBootstrapper::class,
    CryptographyBootstrapper::class,
    DispatcherBootstrapper::class,
    SQLBootstrapper::class,
    UnitOfWorkBootstrapper::class
];