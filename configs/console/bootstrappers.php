<?php
/**
 * Defines the list of bootstrapper classes to load for a console application
 */
use Project\Bootstrappers\Console\Commands\Commands as ProjectCommands;
use Project\Bootstrappers\HTTP\Routing\Router;
use Project\Bootstrappers\HTTP\Views\Template;
use Opulence\Framework\Bootstrappers\Console\Commands\Commands as OpulenceCommands;
use Opulence\Framework\Bootstrappers\Console\Requests\Requests;
use Opulence\Framework\Bootstrappers\Console\Composer\Composer;

return [
    Router::class,
    OpulenceCommands::class,
    Requests::class,
    Composer::class,
    Template::class,
    ProjectCommands::class
];