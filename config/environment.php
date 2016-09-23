<?php
/**
 * ----------------------------------------------------------
 * Load environment config files
 * ----------------------------------------------------------
 *
 * Note:  For performance in production, it's highly suggested
 * you set environment variables on the server itself
 */
$environmentConfigFiles = [
    __DIR__ . "/environment/.env.app.php"
];

foreach ($environmentConfigFiles as $environmentFile) {
    require $environmentFile;
}