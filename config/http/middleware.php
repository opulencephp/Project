<?php
use Project\Http\Middleware\CheckCsrfToken;
use Project\Http\Middleware\Session;

/**
 * ----------------------------------------------------------
 * Define the list of middleware to be run on all routes
 * ----------------------------------------------------------
 */
return [
    Session::class,
    CheckCsrfToken::class
];