<?php
use Opulence\Cache\FileBridge;
use Opulence\Environments\Environment;
use Opulence\Framework\Configuration\Config;
use Opulence\Sessions\Handlers\FileSessionHandler;

/**
 * ----------------------------------------------------------
 * Define the session config
 * ----------------------------------------------------------
 */
return [
    /**
     * ----------------------------------------------------------
     * General settings
     * ----------------------------------------------------------
     *
     * "handler" => The name of the session handler class
     * "lifetime" => Lifetime of the session in seconds
     * "name" => The name of the session
     * "isEncrypted" => Whether or not the session data is encrypted when stored
     */
    'handler' => Environment::getVar('SESSION_HANDLER', FileSessionHandler::class),
    'lifetime' => 7200,
    'name' => '__opulence_session',
    'isEncrypted' => false,

    /**
     * ----------------------------------------------------------
     * Garbage collection settings
     * ----------------------------------------------------------
     *
     * "gc.chance" => The chance that garbage collection will be run
     * "gc.divisor" => The divisor to calculate the probability (default is 1 in 100 chance)
     */
    'gc.chance' => 1,
    'gc.divisor' => 100,

    /**
     * ----------------------------------------------------------
     * Settings for the session Id cookie
     * ----------------------------------------------------------
     *
     * These are useful if you use a cookie to remember the session Id between requests
     *
     * "cookie.domain" => The domain of the cookie
     * "cookie.isHttpOnly" => Whether or not the cookie is HTTP-only
     * "cookie.isSecure" => Whether or not the cookie is secure
     * "cookie.path" => The path of the cookie
     */
    'cookie.domain' => Environment::getVar('SESSION_COOKIE_DOMAIN', ''),
    'cookie.isHttpOnly' => true,
    'cookie.isSecure' => Environment::getVar('SESSION_COOKIE_IS_SECURE', false),
    'cookie.path' => Environment::getVar('SESSION_COOKIE_PATH', '/'),

    /**
     * ----------------------------------------------------------
     * Cache-backed session settings
     * ----------------------------------------------------------
     *
     * "cache.bridge" => The name of the cache bridge class your sessions use
     * "cache.clientName" => The name of the client to use in your cache bridge
     * "cache.keyPrefix" => The prefix to use on all cache keys to avoid naming collisions
     */
    'cache.bridge' => Environment::getVar('SESSION_CACHE_BRIDGE', FileBridge::class),
    'cache.clientName' => 'default',
    'cache.keyPrefix' => 'opulence:',

    /**
     * ----------------------------------------------------------
     * File-backed session settings
     * ----------------------------------------------------------
     *
     * "file.path" => The path of the session file
     */
    'file.path' => Config::get('paths', 'tmp.framework.http') . '/sessions',

    /**
     * ----------------------------------------------------------
     * XSRF cookie settings
     * ----------------------------------------------------------
     *
     * "xsrfcookie.lifetime" => Lifetime of the XSRF cookie in seconds
     */
    'xsrfcookie.lifetime' => 7200
];
