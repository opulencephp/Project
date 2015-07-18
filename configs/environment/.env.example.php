<?php
/**
 * Defines an example environment config
 */
use Opulence\Applications\Environments\Environment;
use Opulence\Cache\FileBridge;
use Opulence\Sessions\Handlers\FileSessionHandler;

/** @var Environment $environment */
/**
 * ----------------------------------------------------------
 * Set SQL database connection info
 * ----------------------------------------------------------
 */
$environment->setVariable("DB_HOST", "localhost");
$environment->setVariable("DB_USER", "myuser");
$environment->setVariable("DB_PASSWORD", "mypassword");
$environment->setVariable("DB_NAME", "public");
$environment->setVariable("DB_PORT", 5432);

/**
 * ----------------------------------------------------------
 * Set the session handler and cache bridge
 * ----------------------------------------------------------
 */
$environment->setVariable("SESSION_HANDLER", FileSessionHandler::class);
$environment->setVariable("SESSION_CACHE_BRIDGE", FileBridge::class);

/**
 * ----------------------------------------------------------
 * Set Memcached connection info
 * ----------------------------------------------------------
 */
$environment->setVariable("MEMCACHED_HOST", "localhost");
$environment->setVariable("MEMCACHED_PORT", 11211);

/**
 * ----------------------------------------------------------
 * Set Redis connection info
 * ----------------------------------------------------------
 */
$environment->setVariable("REDIS_HOST", "localhost");
$environment->setVariable("REDIS_PASSWORD", null);
$environment->setVariable("REDIS_PORT", 6379);

/**
 * ----------------------------------------------------------
 * Set the encryption key
 * ----------------------------------------------------------
 */
$environment->setVariable("ENCRYPTION_KEY", "");