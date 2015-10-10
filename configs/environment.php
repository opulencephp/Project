<?php
/**
 * Defines the environment config
 */
use Opulence\Applications\Environments\Environment;
use Opulence\Applications\Environments\Hosts\HostRegex;
use Opulence\Applications\Environments\Resolvers\EnvironmentResolver;

/**
 * ----------------------------------------------------------
 * Register the hosts
 * ----------------------------------------------------------
 */
$environmentResolver = new EnvironmentResolver();
$environmentResolver->registerHost("production", [
    // Add any production hosts here
    new HostRegex("^.*$")
]);
$environmentResolver->registerHost("staging", [
    // Add any staging hosts here
]);
$environmentResolver->registerHost("testing", [
    // Add any testing hosts here
]);
$environmentResolver->registerHost("development", [
    // Add any development hosts here
]);
$environment = new Environment($environmentResolver->resolve(gethostname()));

/**
 * ----------------------------------------------------------
 * Load environment variables for non-production environments
 * ----------------------------------------------------------
 *
 * Note:  For performance in production, it's highly suggested
 * you set environment variables on the server itself
 */
if ($environment->getName() != "production") {
    foreach (glob(__DIR__ . "/environment/.env.*.php") as $environmentFile) {
        if (basename($environmentFile) != ".env.example.php") {
            require $environmentFile;
        }
    }
}

return $environment;