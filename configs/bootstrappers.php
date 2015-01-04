<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the list of bootstrapper classes to load
 */
// Order here matters
return [
    "Project\\HTTP\\Bootstrappers\\Views\\Template",
    "Project\\HTTP\\Bootstrappers\\Routing\\Router",
    "Project\\HTTP\\Bootstrappers\\Views\\Builders",
    "Project\\HTTP\\Bootstrappers\\Views\\TemplateFunctions",
    "Project\\Bootstrappers\\Authentication\\Credentials",
    "Project\\Bootstrappers\\ORM\\ORM"
];