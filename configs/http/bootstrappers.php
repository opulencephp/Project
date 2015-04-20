<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the list of bootstrapper classes to load for an HTTP application
 */
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
    "RDev\\Framework\\Bootstrappers\\HTTP\\Requests\\Request",
    "RDev\\Framework\\Bootstrappers\\HTTP\\Views\\Template",
    "RDev\\Framework\\Bootstrappers\\HTTP\\Routing\\Router",
    "RDev\\Framework\\Bootstrappers\\HTTP\\Views\\TemplateFunctions",
    /**
     * ----------------------------------------------------------
     * Your bootstrappers
     * ----------------------------------------------------------
     *
     * List any HTTP bootstrappers you'd like here
     */
    "Project\\Bootstrappers\\HTTP\\Views\\Builders",
    "Project\\Bootstrappers\\Routing\\Router"
];