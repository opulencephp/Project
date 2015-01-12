<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the list of bootstrapper classes to load
 */
// Order here matters
return [
    "Project\\Bootstrappers\\Authentication\\Credentials",
    "Project\\Bootstrappers\\ORM\\ORM"
];