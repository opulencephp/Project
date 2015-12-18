<?php
use Opulence\Bootstrappers\Paths;

/**
 * ----------------------------------------------------------
 * Define the list of paths needed by this application
 * ----------------------------------------------------------
 */
$pathsConfig = [
    /**
     * ----------------------------------------------------------
     * Configs
     * ----------------------------------------------------------
     *
     * "config" => The config directory
     * "config.console" => The console config directory
     * "config.http" => The Http config directory
     */
    "config" => __DIR__,
    "config.console" => __DIR__ . "/console",
    "config.http" => __DIR__ . "/http",

    /**
     * ----------------------------------------------------------
     * Logs
     * ----------------------------------------------------------
     *
     * "logs" => The logs directory
     */
    "logs" => __DIR__ . "/../tmp/logs",

    /**
     * ----------------------------------------------------------
     * Public
     * ----------------------------------------------------------
     *
     * "public" => The public directory
     */
    "public" => __DIR__ . "/../public",

    /**
     * ----------------------------------------------------------
     * Resources
     * ----------------------------------------------------------
     *
     * "resources" => The resources directory
     * "resources.lang" => The language resources directory
     * "resources.lang.en" => The English language resources directory
     */
    "resources" => __DIR__ . "/../resources",
    "resources.lang" => __DIR__ . "/../resources/lang",
    "resources.lang.en" => __DIR__ . "/../resources/lang/en",

    /**
     * ----------------------------------------------------------
     * Root
     * ----------------------------------------------------------
     *
     * "root" => The root directory
     */
    "root" => __DIR__ . "/..",

    /**
     * ----------------------------------------------------------
     * Routes
     * ----------------------------------------------------------
     *
     * "routes.cache" => The cached routes directory
     */
    "routes.cache" => __DIR__ . "/../tmp/framework/http/routing",

    /**
     * ----------------------------------------------------------
     * Source
     * ----------------------------------------------------------
     *
     * "src" => The application source directory
     */
    "src" => __DIR__ . "/../src",

    /**
     * ----------------------------------------------------------
     * Tests
     * ----------------------------------------------------------
     *
     * "tests" => The tests directory
     */
    "tests" => __DIR__ . "/../tests/src",

    /**
     * ----------------------------------------------------------
     * Temporary
     * ----------------------------------------------------------
     *
     * "tmp" => The temporary directory
     * "tmp.framework.console" => The framework's temporary console directory
     * "tmp.framework.http" => The framework's temporary Http directory
     */
    "tmp" => __DIR__ . "/../tmp",
    "tmp.framework.console" => __DIR__ . "/../tmp/framework/console",
    "tmp.framework.http" => __DIR__ . "/../tmp/framework/http",

    /**
     * ----------------------------------------------------------
     * Vendor
     * ----------------------------------------------------------
     *
     * "vendor" => The vendor directory
     */
    "vendor" => __DIR__ . "/../vendor",

    /**
     * ----------------------------------------------------------
     * Views
     * ----------------------------------------------------------
     *
     * "views.compiled" => The compiled views directory
     * "views.raw" => The raw views directory
     */
    "views.compiled" => __DIR__ . "/../tmp/framework/http/views",
    "views.raw" => __DIR__ . "/../resources/views"
];

// Get the autoloader
require $pathsConfig["vendor"] . "/autoload.php";

return new Paths($pathsConfig);