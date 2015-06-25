<?php
/**
 * Defines the environment config
 */
use RDev\Applications\Environments\Environment;
use RDev\Applications\Environments\EnvironmentDetector;
use RDev\Applications\Environments\Hosts\Host;
use RDev\Applications\Environments\Hosts\HostRegistry;

/**
 * ----------------------------------------------------------
 * Create the environment registry
 * ----------------------------------------------------------
 */
$detector = new EnvironmentDetector();
$registry = new HostRegistry();
$registry->registerHost("production", [
    // Add any production hosts here
    new Host("#^.*$#", true)
]);
$registry->registerHost("staging", [
    // Add any staging hosts here
]);
$registry->registerHost("testing", [
    // Add any testing hosts here
]);
$registry->registerHost("development", [
    // Add any development hosts here
]);
$environmentName = $detector->detect($registry);
$environment = new Environment($environmentName);

/**
 * ----------------------------------------------------------
 * Load environment variables for non-production environments
 * ----------------------------------------------------------
 *
 * Note:  For performance in production, it's highly suggested
 * you set environment variables on the server itself
 */
if($environmentName != "production")
{
    foreach(glob(__DIR__ . "/environment/.env.*.php") as $environmentFile)
    {
        if(basename($environmentFile) != ".env.example.php")
        {
            require $environmentFile;
        }
    }
}

return $environment;