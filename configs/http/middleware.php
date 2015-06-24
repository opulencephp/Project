<?php
/**
 * Defines the list of global middleware to be run on all routes
 */
use Project\HTTP\Middleware\Session;
use Project\HTTP\Middleware\CheckCSRFToken;

return [
    Session::class,
    CheckCSRFToken::class
];