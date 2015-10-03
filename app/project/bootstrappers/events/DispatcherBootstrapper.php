<?php
/**
 * Defines the event dispatcher bootstrapper
 */
namespace Project\Bootstrappers\Events;

use Opulence\Framework\Bootstrappers\Events\DispatcherBootstrapper as BaseBootstrapper;

class DispatcherBootstrapper extends BaseBootstrapper
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