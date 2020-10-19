<?php


namespace Core\Libs;

use Libs\SingletonTrait;


class Cache
{
    use SingletonTrait;
    private static $redis;

    public function __construct()
    {
        try
        {
            self::$redis = new \Redis();
            self::$redis->connect($_ENV['REDIS_HOST'], $_ENV['REDIS_PORT']);

        }
        catch (\Exception $error)
        {
        $error->getMessage();
        }
    }

    public static function set($key, $value)
    {
        if(!self::$redis->exists($key))
        {
            self::$redis->set($key, $value);
        }
        else trigger_error("This key is exists", E_USER_WARNING);

    }

    public static function get($key)
    {
        if(!self::$redis->exists($key)) trigger_error("This key not exists", E_USER_WARNING);
        return self::$redis->get($key);
    }

    public static function exists($key)
    {
        return self::$redis->exists($key);
    }




}