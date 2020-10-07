<?php


namespace Core\Libs;

use Libs\SingletonTrait;


class Cache
{

    use SingletonTrait;

    protected $redis;

    public function __construct()
    {
        try
        {
            $this->redis = new \Redis();
            $this->redis->connect($_ENV['REDIS_HOST'], $_ENV['REDIS_PORT']);

        }
        catch (\Exception $error)
        {
        $error->getMessage();
        }
    }

    public static function set($key, $value)
    {
        if(!$this->redis->exists($key))
        {
            $this->redis->set($key, $value);
        }
        else trigger_error("This key is exists", E_USER_WARNING);

    }

    public static function get($key)
    {
        if(!$this->redis->exists($key)) trigger_error("This key not exists", E_USER_WARNING);
        return $this->redis->get($key);
    }





}