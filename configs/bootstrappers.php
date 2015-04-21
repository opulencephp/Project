<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines the list of bootstrapper classes to load
 */
use Project\Bootstrappers\Authentication\Credentials;
use Project\Bootstrappers\Databases\SQL;
use Project\Bootstrappers\ORM\UnitOfWork;
use RDev\Framework\Bootstrappers\Cryptography\Cryptography;

/**
 * ----------------------------------------------------------
 * List of bootstrapper classes
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
    Cryptography::class,
    /**
     * ----------------------------------------------------------
     * Your bootstrappers
     * ----------------------------------------------------------
     *
     * List any console bootstrappers you'd like here
     * To enable Redis, add "Project\\Bootstrappers\\Databases\\Redis"
     */
    Credentials::class,
    SQL::class,
    UnitOfWork::class
];