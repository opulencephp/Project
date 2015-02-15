<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the list of bootstrapper classes to load for a console application
 */
/**
 * ----------------------------------------------------------
 * List of console-specific bootstrapper classes
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
    "RDev\\Framework\\Bootstrappers\\HTTP\\Views\\Template",
    "RDev\\Framework\\Bootstrappers\\Console\\Commands\\Commands",
    "RDev\\Framework\\Bootstrappers\\Console\\Requests\\Requests",
    /**
     * ----------------------------------------------------------
     * Your bootstrappers
     * ----------------------------------------------------------
     *
     * List any console bootstrappers you'd like here
     */
];