<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the list of bootstrapper classes to load
 */
// Order here matters
return [
    "Project\\Authentication\\Bootstrappers\\Credentials",
    "Project\\ORM\\Bootstrappers\\ORM"
];