<?php
namespace Project\Bootstrappers\Databases;

use Opulence\Bootstrappers\Bootstrapper;
use Opulence\Bootstrappers\ILazyBootstrapper;
use Opulence\Ioc\IContainer;
use Opulence\Redis\Redis;
use Opulence\Redis\TypeMapper;
use Redis as Client;

/**
 * Defines the Redis bootstrapper
 */
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