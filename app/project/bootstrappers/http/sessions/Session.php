<?php
/**
 * Defines the session bootstrapper
 */
namespace Project\Bootstrappers\HTTP\Sessions;
use RDev\Cache\ArrayBridge;
use RDev\Cache\FileBridge;
use RDev\Cache\ICacheBridge;
use RDev\Cache\MemcachedBridge;
use RDev\Cache\RedisBridge;
use RDev\Framework\Bootstrappers\HTTP\Sessions\Session as BaseSession;
use RDev\IoC\IContainer;
use RDev\Sessions\Handlers\CacheSessionHandler;
use RDev\Sessions\Handlers\FileSessionHandler;
use RDev\Sessions\ISession;
use RDev\Sessions\Session as RDevSession;
use SessionHandlerInterface;

class Session extends BaseSession
{
    /** @var array|null The config array */
    private $config = null;

    /**
     * Gets the session object to use
     *
     * @param IContainer $container The IoC Container
     * @return ISession The session to use
     */
    protected function getSession(IContainer $container)
    {
        $this->loadConfig();
        $session = new RDevSession();
        $session->setName($this->config["name"]);

        return $session;
    }

    /**
     * Gets the session handler object to use
     *
     * @param IContainer $container The IoC Container
     * @return SessionHandlerInterface The session handler to use
     */
    protected function getSessionHandler(IContainer $container)
    {
        $this->loadConfig();

        switch($this->environment->getVariable("SESSION_HANDLER"))
        {
            case CacheSessionHandler::class:
                return new CacheSessionHandler($this->getCacheBridge($container), $this->config["lifetime"]);
            default: // FileSessionHandler
                return new FileSessionHandler($this->config["file.path"]);
        }
    }

    /**
     * Gets the cache bridge to use for a cache session handler
     *
     * @param IContainer $container The IoC container
     * @return ICacheBridge The cache bridge
     */
    private function getCacheBridge(IContainer $container)
    {
        switch($this->environment->getVariable("SESSION_CACHE_BRIDGE"))
        {
            case ArrayBridge::class:
                return new ArrayBridge();
            case MemcachedBridge::class:
                return $container->makeShared(MemcachedBridge::class, [$this->config["cache.keyPrefix"]]);
            case RedisBridge::class:
                return $container->makeShared(RedisBridge::class, [$this->config["cache.keyPrefix"]]);
            default: // FileBridge
                return new FileBridge($this->config["file.path"]);
        }
    }

    /**
     * Loads the configuration array
     */
    private function loadConfig()
    {
        if($this->config === null)
        {
            $this->config = require $this->paths["configs"] . "/http/sessions.php";;
        }
    }
}