<?php
namespace Project\Application\Bootstrappers\Events;

use Opulence\Framework\Events\Bootstrappers\DispatcherBootstrapper as BaseBootstrapper;

/**
 * Defines the event dispatcher bootstrapper
 */
class EventDispatcherBootstrapper extends BaseBootstrapper
{
    /**
     * Gets the list of event names to the list of listeners, which can be callables or "className@method" strings
     *
     * @return array The event listener config
     */
    protected function getEventListenerConfig() : array
    {
        return require "{$this->paths["config"]}/events.php";
    }
}