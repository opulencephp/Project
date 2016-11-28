<?php
namespace Project\Application\Bootstrappers\Http\Sessions;

use Opulence\Cache\ArrayBridge;
use Opulence\Cache\FileBridge;
use Opulence\Cache\ICacheBridge;
use Opulence\Cache\MemcachedBridge;
use Opulence\Cache\RedisBridge;
use Opulence\Framework\Configuration\Config;
use Opulence\Framework\Sessions\Bootstrappers\SessionBootstrapper as BaseBootstrapper;
use Opulence\Ioc\IContainer;
use Opulence\Memcached\Memcached;
use Opulence\Redis\Redis;
use Opulence\Sessions\Handlers\ArraySessionHandler;
use Opulence\Sessions\Handlers\CacheSessionHandler;
use Opulence\Sessions\Handlers\FileSessionHandler;
use Opulence\Sessions\Handlers\IEncryptableSessionHandler;
use Opulence\Sessions\ISession;
use Opulence\Sessions\Session;
use SessionHandlerInterface;

/**
 * Defines the session bootstrapper
 */
class SessionBootstrapper extends BaseBootstrapper
{
    /**
     * Gets the session object to use
     *
     * @param IContainer $container The IoC Container
     * @return ISession The session to use
     */
    protected function getSession(IContainer $container) : ISession
    {
        $session = new Session();
        $session->setName(Config::get("sessions", "name"));

        return $session;
    }

    /**
     * Gets the session handler object to use
     *
     * @param IContainer $container The IoC Container
     * @return SessionHandlerInterface The session handler to use
     */
    protected function getSessionHandler(IContainer $container) : SessionHandlerInterface
    {
        switch (Config::get("sessions", "handler")) {
            case CacheSessionHandler::class:
                $handler = new CacheSessionHandler(
                    $this->getCacheBridge($container),
                    Config::get("sessions", "lifetime")
                );
                break;
            case ArraySessionHandler::class:
                $handler = new ArraySessionHandler();
                break;
            default: // FileSessionHandler
                $handler = new FileSessionHandler(Config::get("sessions", "file.path"));
        }

        if (Config::get("sessions", "isEncrypted") && $handler instanceof IEncryptableSessionHandler) {
            $handler->useEncryption(true);
            $handler->setEncrypter($this->getSessionEncrypter($container));
        }

        return $handler;
    }

    /**
     * Gets the cache bridge to use for a cache session handler
     *
     * @param IContainer $container The IoC container
     * @return ICacheBridge The cache bridge
     */
    private function getCacheBridge(IContainer $container) : ICacheBridge
    {
        switch (Config::get("sessions", "cache.bridge")) {
            case ArrayBridge::class:
                return new ArrayBridge();
            case MemcachedBridge::class:
                return new MemcachedBridge(
                    $container->resolve(Memcached::class),
                    Config::get("sessions", "cache.clientName"),
                    Config::get("sessions", "cache.keyPrefix")
                );
            case RedisBridge::class:
                return new RedisBridge(
                    $container->resolve(Redis::class),
                    Config::get("sessions", "cache.clientName"),
                    Config::get("sessions", "cache.keyPrefix")
                );
            default: // FileBridge
                return new FileBridge(Config::get("sessions", "file.path"));
        }
    }
}