<?php
use Project\Bootstrappers\Console\Commands\CommandsBootstrapper as ProjectCommandsBootstrapper;
use Project\Bootstrappers\Http\Routing\RouterBootstrapper;
use Project\Bootstrappers\Http\Views\ViewBootstrapper;
use Opulence\Framework\Bootstrappers\Console\Commands\CommandsBootstrapper as OpulenceCommandsBootstrapper;
use Opulence\Framework\Bootstrappers\Console\Requests\RequestsBootstrapper;
use Opulence\Framework\Bootstrappers\Console\Composer\ComposerBootstrapper;

/**
 * ----------------------------------------------------------
 * Define bootstrapper classes for a console application
 * ----------------------------------------------------------
 */
return [
    RouterBootstrapper::class,
    OpulenceCommandsBootstrapper::class,
    RequestsBootstrapper::class,
    ComposerBootstrapper::class,
    ViewBootstrapper::class,
    ProjectCommandsBootstrapper::class
];