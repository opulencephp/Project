<?php
/**
 * Copyright (C) 2014 David Young
 *
 * Defines the dependency injection config
 */
$fileSystem = new \RDev\Files\FileSystem();

return [
    // The container class to use
    "container" => "RDev\\IoC\\Container",
    // The abstract class/interface to concrete class mappings
    "universal" => [
        "RDev\\Authentication\\Credentials\\ICredentials" => "RDev\\Authentication\\Credentials\\Credentials",
        "RDev\\Cryptography\\IHasher" => "RDev\\Cryptography\\BCryptHasher",
        "RDev\\Files\\FileSystem" => $fileSystem,
        "RDev\\Sessions\\ISession" => "RDev\\Sessions\\Session",
        "RDev\\Views\\Cache\\ICache" => new \RDev\Views\Cache\Cache(
            $fileSystem,
            // The path to store compiled templates
            // Make sure this path is writable
            __DIR__ . "/../views/compiled",
            // The lifetime of cached templates
            3600,
            // The chance that garbage collection will be run
            1,
            // The number the chance will be divided by to calculate the probability (default is 1 in 100 chance)
            100
        ),
        "RDev\\Views\\Compilers\\ICompiler" => "RDev\\Views\\Compilers\\Compiler",
        "RDev\\Views\\IFactory" => new \RDev\Views\Factory(
            $fileSystem,
            // The path to the template directory
            __DIR__ . "/../views"
        )
    ],
    "targeted" => [
        // Target class names mapped to an array of abstract class/interface to concrete class mappings
    ]
];