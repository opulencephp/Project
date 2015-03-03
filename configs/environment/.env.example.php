<?php
/**
 * Copyright (C) 2015 David Young
 * 
 * Defines an example environment config
 */
use RDev\Applications\Environments\Environment;

/**
 * ----------------------------------------------------------
 * Set SQL database connection info
 * ----------------------------------------------------------
 *
 * @var Environment $environment
 */
$environment->setVariable("DB_HOST", "localhost");
$environment->setVariable("DB_USER", "myuser");
$environment->setVariable("DB_PASSWORD", "mypassword");
$environment->setVariable("DB_NAME", "public");
$environment->setVariable("DB_PORT", 5432);

/**
 * ----------------------------------------------------------
 * Set Redis connection info
 * ----------------------------------------------------------
 */
$environment->setVariable("REDIS_HOST", "localhost");
$environment->setVariable("REDIS_PASSWORD", null);
$environment->setVariable("REDIS_PORT", 6379);

/**
 * ----------------------------------------------------------
 * Set the encryption key
 * ----------------------------------------------------------
 */
$environment->setVariable("ENCRYPTION_KEY", "");