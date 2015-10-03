<?php
/**
 * Defines the list of bootstrapper classes to load for a console application
 */
use Project\Bootstrappers\Console\Commands\CommandsBootstrapper as ProjectCommandsBootstrapper;
use Project\Bootstrappers\HTTP\Routing\RouterBootstrapper;
use Project\Bootstrappers\HTTP\Views\ViewBootstrapper;
use Opulence\Framework\Bootstrappers\Console\Commands\CommandsBootstrapper as OpulenceCommandsBootstrapper;
use Opulence\Framework\Bootstrappers\Console\Requests\RequestsBootstrapper;
use Opulence\Framework\Bootstrappers\Console\Composer\ComposerBootstrapper;

return [
    RouterBootstrapper::class,
    OpulenceCommandsBootstrapper::class,
    RequestsBootstrapper::class,
    ComposerBootstrapper::class,
    ViewBootstrapper::class,
    ProjectCommandsBootstrapper::class
];