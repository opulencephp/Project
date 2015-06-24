<?php
/**
 * Defines the list of bootstrapper classes to load for a console application
 */
use Project\Bootstrappers\Console\Commands\Commands as ProjectCommands;
use Project\Bootstrappers\HTTP\Routing\Router;
use Project\Bootstrappers\HTTP\Views\Template;
use RDev\Framework\Bootstrappers\Console\Commands\Commands as RDevCommands;
use RDev\Framework\Bootstrappers\Console\Requests\Requests;
use RDev\Framework\Bootstrappers\Console\Composer\Composer;

return [
    Router::class,
    RDevCommands::class,
    Requests::class,
    Composer::class,
    Template::class,
    ProjectCommands::class
];