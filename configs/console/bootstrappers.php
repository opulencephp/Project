<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the list of bootstrapper classes to load for a console application
 */
use Project\Bootstrappers\Console\Commands\Commands as ProjectCommands;
use Project\Bootstrappers\HTTP\Views\Template;
use RDev\Framework\Bootstrappers\Console\Commands\Commands as RDevCommands;
use RDev\Framework\Bootstrappers\Console\Requests\Requests;
use RDev\Framework\Bootstrappers\Console\Composer\Composer;

/**
 * ----------------------------------------------------------
 * List of console-specific bootstrapper classes
 * ----------------------------------------------------------
 */
return [
    /**
     * ----------------------------------------------------------
     * RDev bootstrappers
     * ----------------------------------------------------------
     *
     * Keep these bootstrappers unless you want to customize anything that they bind
     */
    RDevCommands::class,
    Requests::class,
    Composer::class,
    /**
     * ----------------------------------------------------------
     * Your bootstrappers
     * ----------------------------------------------------------
     *
     * List any console bootstrappers you'd like here
     */
    Template::class,
    ProjectCommands::class
];