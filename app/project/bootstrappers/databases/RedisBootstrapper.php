<?php
/**
 * Defines the Redis bootstrapper
 */
namespace Project\Bootstrappers\Databases;

use Opulence\Applications\Bootstrappers\Bootstrapper;
use Opulence\Applications\Bootstrappers\ILazyBootstrapper;
use Opulence\IoC\IContainer;
use Opulence\Redis\Redis;
use Opulence\Redis\TypeMapper;
use Redis as Client;

class RedisBootstrapper extends Bootstrapper implements ILazyBootstrapper
{
    /**
     * @inheritdoc
     */
    public function getBindings()
    {
        return [Redis::class];
    }

    /**
     * @inheritdoc
     */
    public function registerBindings(IContainer $container)
    {
        $client = new Client();
        $client->connect(
            $this->environment->getVar("REDIS_HOST"),
            $this->environment->getVar("REDIS_PORT")
        );
        $client->select($this->environment->getVar("REDIS_DATABASE"));
        $redis = new Redis(
            $client,
            new TypeMapper()
        );
        $container->bind([Redis::class], $redis);
    }
}