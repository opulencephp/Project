<?php
/**
 * Defines the list of bootstrapper classes to load for an HTTP application
 */
use Project\Bootstrappers\HTTP\Routing\RouterBootstrapper;
use Project\Bootstrappers\HTTP\Sessions\SessionBootstrapper;
use Project\Bootstrappers\HTTP\Views\BuildersBootstrapper;
use Project\Bootstrappers\HTTP\Views\ViewBootstrapper;
use Opulence\Framework\Bootstrappers\HTTP\Requests\RequestBootstrapper;
use Opulence\Framework\Bootstrappers\HTTP\Views\ViewFunctionsBootstrapper;

return [
    RequestBootstrapper::class,
    RouterBootstrapper::class,
    ViewBootstrapper::class,
    SessionBootstrapper::class,
    ViewFunctionsBootstrapper::class,
    BuildersBootstrapper::class
];