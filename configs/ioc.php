<?php
/**
 * Copyright (C) 2014 David Young
 *
 * Defines the dependency injection config
 */
return [
    // The container class to use
    "container" => "RDev\\IoC\\Container",
    // The abstract class/interface to concrete class mappings
    "universal" => [
        "RDev\\Authentication\\Credentials\\ICredentials" => "RDev\\Authentication\\Credentials\\Credentials",
        "RDev\\Cryptography\\IHasher" => "RDev\\Cryptography\\BCryptHasher",
        "RDev\\Sessions\\ISession" => "RDev\\Sessions\\Session",
        "RDev\\Views\\Templates\\ICache" => "RDev\\Views\\Cache\\Cache",
        "RDev\\Views\\Templates\\ICompiler" => "RDev\\Views\\Templates\\Compiler"
    ],
    "targeted" => [
        // Target class names mapped to an array of abstract class/interface to concrete class mappings
    ]
];