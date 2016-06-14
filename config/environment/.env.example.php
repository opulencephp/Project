<?php
use Opulence\Cache\FileBridge;
use Opulence\Environments\Environment;
use Opulence\Sessions\Handlers\FileSessionHandler;

/** @var Environment $environment */
/**
 * ----------------------------------------------------------
 * Set authentication info
 * ----------------------------------------------------------
 *
 * "CLIENT_ID" => The Id of the client (can remain a static value)
 */
$environment->setVar("CLIENT_ID", "MyProject");

/**
 * ----------------------------------------------------------
 * Set SQL database connection info
 * ----------------------------------------------------------
 */
$environment->setVar("DB_HOST", "localhost");
$environment->setVar("DB_USER", "myuser");
$environment->setVar("DB_PASSWORD", "mypassword");
$environment->setVar("DB_NAME", "public");
$environment->setVar("DB_PORT", 5432);

/**
 * ----------------------------------------------------------
 * Set the session handler and cache bridge
 * ----------------------------------------------------------
 */
$environment->setVar("SESSION_HANDLER", FileSessionHandler::class);
$environment->setVar("SESSION_CACHE_BRIDGE", FileBridge::class);

/**
 * ----------------------------------------------------------
 * Set Memcached connection info
 * ----------------------------------------------------------
 */
$environment->setVar("MEMCACHED_HOST", "localhost");
$environment->setVar("MEMCACHED_PORT", 11211);

/**
 * ----------------------------------------------------------
 * Set Redis connection info
 * ----------------------------------------------------------
 */
$environment->setVar("REDIS_HOST", "localhost");
$environment->setVar("REDIS_PORT", 6379);
$environment->setVar("REDIS_DATABASE", 0);

/**
 * ----------------------------------------------------------
 * Set the encryption key
 * ----------------------------------------------------------
 */
$environment->setVar("ENCRYPTION_KEY", "");