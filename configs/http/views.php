<?php
/**
 * Copyright (C) 2015 David Young
 *
 * Defines the view config
 */
/**
 * ----------------------------------------------------------
 * Defines view properties
 * ----------------------------------------------------------
 */
return [
    /**
     * ----------------------------------------------------------
     * General settings
     * ----------------------------------------------------------
     *
     * "cache.lifetime" => Lifetime of the cached views in seconds
     */
    "cache.lifetime" => 3600,
    /**
     * ----------------------------------------------------------
     * Garbage collection settings
     * ----------------------------------------------------------
     *
     * "gc.chance" => The chance that garbage collection will be run
     * "gc.divisor" => The divisor to calculate the probability (default is 1 in 100 chance)
     */
    "gc.chance" => 1,
    "gc.divisor" => 100
];