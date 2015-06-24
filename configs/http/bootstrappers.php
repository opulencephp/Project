<?php
/**
 * Defines the list of bootstrapper classes to load for an HTTP application
 */
use Project\Bootstrappers\HTTP\Routing\Router;
use Project\Bootstrappers\HTTP\Sessions\Session;
use Project\Bootstrappers\HTTP\Views\Builders;
use Project\Bootstrappers\HTTP\Views\Template;
use RDev\Framework\Bootstrappers\HTTP\Requests\Request;
use RDev\Framework\Bootstrappers\HTTP\Views\TemplateFunctions;

return [
    Request::class,
    Router::class,
    TemplateFunctions::class,
    Session::class,
    Template::class,
    Builders::class
];