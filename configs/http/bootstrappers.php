<?php
/**
 * Defines the list of bootstrapper classes to load for an HTTP application
 */
use Project\Bootstrappers\HTTP\Routing\Router;
use Project\Bootstrappers\HTTP\Sessions\Session;
use Project\Bootstrappers\HTTP\Views\Builders;
use Project\Bootstrappers\HTTP\Views\View;
use Opulence\Framework\Bootstrappers\HTTP\Requests\Request;
use Opulence\Framework\Bootstrappers\HTTP\Views\ViewFunctions;

return [
    Request::class,
    Router::class,
    View::class,
    Session::class,
    ViewFunctions::class,
    Builders::class
];