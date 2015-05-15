<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the list of bootstrapper classes to load for an HTTP application
 */
use Project\Bootstrappers\HTTP\Routing\Router as ProjectRouter;
use Project\Bootstrappers\HTTP\Sessions\Session;
use Project\Bootstrappers\HTTP\Views\Builders;
use Project\Bootstrappers\HTTP\Views\Template;
use RDev\Framework\Bootstrappers\HTTP\Requests\Request;
use RDev\Framework\Bootstrappers\HTTP\Routing\Router as RDevRouter;
use RDev\Framework\Bootstrappers\HTTP\Views\TemplateFunctions;

/**
 * ----------------------------------------------------------
 * List of HTTP-specific bootstrapper classes
 * ----------------------------------------------------------
 */
return [
    /**
     * ----------------------------------------------------------
     * RDev bootstrappers
     * ----------------------------------------------------------
     *
     * Keep these bootstrappers unless you want to customize anything that they bind
     */
    Session::class,
    Request::class,
    Template::class,
    RDevRouter::class,
    TemplateFunctions::class,
    /**
     * ----------------------------------------------------------
     * Your bootstrappers
     * ----------------------------------------------------------
     *
     * List any HTTP bootstrappers you'd like here
     */
    Builders::class,
    ProjectRouter::class
];