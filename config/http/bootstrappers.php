<?php
use Opulence\Framework\Http\Bootstrappers\RequestBootstrapper;
use Opulence\Framework\Views\Bootstrappers\ViewFunctionsBootstrapper;
use Project\Application\Bootstrappers\Http\Routing\RouterBootstrapper;
use Project\Application\Bootstrappers\Http\Sessions\SessionBootstrapper;
use Project\Application\Bootstrappers\Http\Views\BuildersBootstrapper;
use Project\Application\Bootstrappers\Http\Views\ViewBootstrapper;

/**
 * ----------------------------------------------------------
 * Define the bootstrapper classes for an HTTP application
 * ----------------------------------------------------------
 */
return [
    RequestBootstrapper::class,
    RouterBootstrapper::class,
    ViewBootstrapper::class,
    SessionBootstrapper::class,
    ViewFunctionsBootstrapper::class,
    BuildersBootstrapper::class
];
