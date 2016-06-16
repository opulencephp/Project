<?php
use Opulence\Framework\Composer\Bootstrappers\ComposerBootstrapper;
use Opulence\Framework\Console\Bootstrappers\CommandsBootstrapper as OpulenceCommandsBootstrapper;
use Opulence\Framework\Console\Bootstrappers\RequestBootstrapper;
use Project\Application\Bootstrappers\Console\Commands\CommandsBootstrapper as ProjectCommandsBootstrapper;
use Project\Application\Bootstrappers\Http\Routing\RouterBootstrapper;
use Project\Application\Bootstrappers\Http\Views\ViewBootstrapper;

/**
 * ----------------------------------------------------------
 * Define bootstrapper classes for a console application
 * ----------------------------------------------------------
 */
return [
    RouterBootstrapper::class,
    OpulenceCommandsBootstrapper::class,
    RequestBootstrapper::class,
    ComposerBootstrapper::class,
    ViewBootstrapper::class,
    ProjectCommandsBootstrapper::class
];