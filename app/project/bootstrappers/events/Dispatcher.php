<?php
/**
 * Defines the event dispatcher bootstrapper
 */
namespace Project\Bootstrappers\Events;
use RDev\Framework\Bootstrappers\Events\Dispatcher as BaseBootstrapper;

class Dispatcher extends BaseBootstrapper
{
    /**
     * Gets the list of event names to the list of listeners, which can be callables or "className@method" strings
     *
     * @return array The event listener config
     */
    protected function getEventListenerConfig()
    {
        return require "{$this->paths["configs"]}/events.php";
    }
}