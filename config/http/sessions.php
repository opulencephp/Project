<?php
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
     * "lifetime" => Lifetime of the session in seconds
     * "name" => The name of the session
     * "isEncrypted" => Whether or not the session data is encrypted when stored
     */
    "lifetime" => 7200,
    "name" => "__opulence_session",
    "isEncrypted" => false,

    /**
     * ----------------------------------------------------------
     * Garbage collection settings
     * ----------------------------------------------------------
     *
     * "gc.chance" => The chance that garbage collection will be run
     * "gc.divisor" => The divisor to calculate the probability (default is 1 in 100 chance)
     */
    "gc.chance" => 1,
    "gc.divisor" => 100,

    /**
     * ----------------------------------------------------------
     * Settings for the session Id cookie
     * ----------------------------------------------------------
     *
     * These are useful if you use a cookie to remember the session Id between requests
     *
     * "cookie.domain" => The domain of the cookie
     * "cookie.isSecure" => Whether or not the cookie is secure
     * "cookie.path" => The path of the cookie
     */
    "cookie.domain" => $environment->getVar("SESSION_COOKIE_DOMAIN", ""),
    "cookie.isSecure" => $environment->getVar("SESSION_COOKIE_IS_SECURE", false),
    "cookie.path" => $environment->getVar("SESSION_COOKIE_PATH", "/"),

    /**
     * ----------------------------------------------------------
     * Cache-backed session settings
     * ----------------------------------------------------------
     *
     * "cache.clientName" => The name of the client to use in your cache bridge
     * "cache.keyPrefix" => The prefix to use on all cache keys to avoid naming collisions
     */
    "cache.clientName" => "default",
    "cache.keyPrefix" => "opulence:",

    /**
     * ----------------------------------------------------------
     * File-backed session settings
     * ----------------------------------------------------------
     *
     * "file.path" => The path of the session file
     */
    "file.path" => realpath(__DIR__ . "/../../tmp/framework/http/sessions"),

    /**
     * ----------------------------------------------------------
     * XSRF cookie settings
     * ----------------------------------------------------------
     *
     * "xsrfcookie.lifetime" => Lifetime of the XSRF cookie in seconds
     */
    "xsrfcookie.lifetime" => 7200
];