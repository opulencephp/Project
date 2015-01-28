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
     * RDev Bootstrappers
     * ----------------------------------------------------------
     *
     * Keep these bootstrappers unless you want to customize anything that they bind
     */
    "RDev\\Framework\\HTTP\\Views\\Bootstrappers\\Template",
    "RDev\\Framework\\HTTP\\Routing\\Bootstrappers\\Router",
    "RDev\\Framework\\HTTP\\Views\\Bootstrappers\\TemplateFunctions",
    /**
     * ----------------------------------------------------------
     * Your Bootstrappers
     * ----------------------------------------------------------
     *
     * List any console bootstrappers you'd like here
     */
    "Project\\HTTP\\Views\\Bootstrappers\\Builders"
];