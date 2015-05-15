<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the session config
 */
/**
 * ----------------------------------------------------------
 * Defines session properties
 * ----------------------------------------------------------
 */
return [
    // The domain of the cookie, if you're using cookie-backed sessions
    "cookie.domain" => "",
    // Whether or not the cookie is secure, if you're using cookie-backed sessions
    "cookie.isSecure" => false,
    // The path of the cookie, if you're using cookie-backed sessions
    "cookie.path" => "/",
    // The path of the session file, if you're using file-backed sessions
    "file.path" => "/tmp",
    // The chance that garbage collection will be run
    "gcChance" => 1,
    // The number the chance will be divided by to calculate the probability (default is 1 in 100 chance)
    "gcTotal" => 100,
    // The lifetime of session in seconds
    "lifetime" => 7200,
    // The name of the session
    "name" => "__rdev_session"
];