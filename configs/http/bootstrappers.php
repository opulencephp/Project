<?php
use Project\Bootstrappers\Http\Routing\RouterBootstrapper;
use Project\Bootstrappers\Http\Sessions\SessionBootstrapper;
use Project\Bootstrappers\Http\Views\BuildersBootstrapper;
use Project\Bootstrappers\Http\Views\ViewBootstrapper;
use Opulence\Framework\Bootstrappers\Http\Requests\RequestBootstrapper;
use Opulence\Framework\Bootstrappers\Http\Views\ViewFunctionsBootstrapper;

/**
 * ----------------------------------------------------------
 * Define the bootstrapper classes for an Http application
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