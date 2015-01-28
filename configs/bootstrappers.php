<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the list of bootstrapper classes to load
 */
/**
 * ----------------------------------------------------------
 * List of bootstrapper classes
 * ----------------------------------------------------------
 */
return [
    /**
     * To enable Redis, add the following bootstrapper:
     * "Project\\Bootstrappers\\Databases\\Redis"
     */
    "Project\\Bootstrappers\\Authentication\\Credentials",
    "Project\\Bootstrappers\\Databases\\SQL",
    "Project\\Bootstrappers\\ORM\\UnitOfWork"
];