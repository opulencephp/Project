<?php
use Project\Http\Middleware\Session;
use Project\Http\Middleware\CheckCsrfToken;

/**
 * ----------------------------------------------------------
 * Define the list of middleware to be run on all routes
 * ----------------------------------------------------------
 */
return [
    Session::class,
    CheckCsrfToken::class
];