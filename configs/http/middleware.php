<?php
/**
 * Defines the list of global middleware to be run on all routes
 */
use Project\HTTP\Middleware\Session;
use Project\HTTP\Middleware\CheckCSRFToken;

return [
    /**
     * ----------------------------------------------------------
     * Middleware to be run on every route
     * ----------------------------------------------------------
     *
     * List any HTTP middleware you'd like here
     */
    Session::class,
    CheckCSRFToken::class
];