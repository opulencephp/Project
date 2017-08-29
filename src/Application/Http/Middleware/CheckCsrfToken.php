<?php
namespace Project\Application\Http\Middleware;

use Opulence\Framework\Configuration\Config;
use Opulence\Framework\Http\CsrfTokenChecker;
use Opulence\Framework\Http\Middleware\CheckCsrfToken as BaseMiddleware;
use Opulence\Http\Responses\Cookie;
use Opulence\Http\Responses\Response;

/**
 * Defines the middleware that checks the CSRF token
 */
class CheckCsrfToken extends BaseMiddleware
{
    /**
     * Writes data to the response
     *
     * @param Response $response The response to write to
     * @return Response The response with the data written to it
     */
    protected function writeToResponse(Response $response) : Response
    {
        // Add an XSRF cookie for JavaScript frameworks to use
        $response->getHeaders()->setCookie(
            new Cookie(
                'XSRF-TOKEN',
                $this->session->get(CsrfTokenChecker::TOKEN_INPUT_NAME),
                time() + Config::get('sessions', 'xsrfcookie.lifetime'),
                Config::get('sessions', 'cookie.path'),
                Config::get('sessions', 'cookie.domain'),
                Config::get('sessions', 'cookie.isSecure'),
                false
            )
        );

        return $response;
    }
}
