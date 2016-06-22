<?php
use Opulence\Environments\Environment;

$environment = new Environment();

/**
 * ----------------------------------------------------------
 * Load environment config files
 * ----------------------------------------------------------
 *
 * Note:  For performance in production, it's highly suggested
 * you set environment variables on the server itself
 */
foreach (glob(__DIR__ . "/environment/.env.*.php") as $environmentFile) {
    if (basename($environmentFile) != ".env.example.php") {
        require $environmentFile;
    }
}

$environment->setName($environment->getVar("ENV_NAME") ?? Environment::PRODUCTION);

return $environment;