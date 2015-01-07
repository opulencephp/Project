<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the list of bootstrapper classes to load for a console application
 */
// Order here matters
return [
    "Project\\Console\\Bootstrappers\\Commands",
    "Project\\Console\\Bootstrappers\\Requests"
];