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
    "RDev\\Framework\\HTTP\\Bootstrappers\\Views\\Template",
    "RDev\\Framework\\HTTP\\Bootstrappers\\Routing\\Router",
    "RDev\\Framework\\HTTP\\Bootstrappers\\Views\\TemplateFunctions",
    /**
     * ----------------------------------------------------------
     * Your Bootstrappers
     * ----------------------------------------------------------
     *
     * List any HTTP bootstrappers you'd like here
     */
    "Project\\Bootstrappers\\HTTP\\Views\\Builders"
];