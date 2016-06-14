<?php
use Opulence\Framework\Bootstrappers\Http\Requests\RequestBootstrapper;
use Opulence\Framework\Bootstrappers\Http\Views\ViewFunctionsBootstrapper;
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