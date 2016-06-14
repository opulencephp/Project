<?php
/**
 * ----------------------------------------------------------
 * Define the authentication and authorization config
 * ----------------------------------------------------------
 */
return [
    /**
     * ----------------------------------------------------------
     * Access token settings
     * ----------------------------------------------------------
     *
     * "at.cookie.domain" => The access token cookie domain
     * "at.cookie.isSecure" => Whether or not the access token cookie is secure
     * "at.cookie.name" => The access token cookie name
     * "at.cookie.path" => The access token cookie path
     * "at.lifetime" => Lifetime of the access token in seconds
     */
    "at.cookie.domain" => "",
    "at.cookie.isSecure" => true,
    "at.cookie.name" => "access_token",
    "at.cookie.path" => "/",
    "at.lifetime" => 60 * 5,

    /**
     * ----------------------------------------------------------
     * Refresh token settings
     * ----------------------------------------------------------
     *
     * "rt.cookie.domain" => The refresh token cookie domain
     * "rt.cookie.isSecure" => Whether or not the refresh token cookie is secure
     * "rt.cookie.name" => The refresh token cookie name
     * "rt.cookie.path" => The refresh token cookie path
     * "rt.lifetime" => Lifetime of the refresh token in seconds
     */
    "rt.cookie.domain" => "",
    "rt.cookie.isHttpOnly" => true,
    "rt.cookie.isSecure" => true,
    "rt.cookie.name" => "refresh_token",
    "rt.cookie.path" => "/",
    "rt.lifetime" => 3600 * 24 * 30,
];