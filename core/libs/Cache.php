<?php


namespace Core\Libs;


class Cache
{

    protected static $cache;

    public static function setDriver($obj)
    {
        $port = '';
        switch (get_class($obj)) {
            case 'Redis' :
                $port = $_ENV['REDIS_PORT'];
                break;
            case 'Memcache' :
                $port = $_ENV['MEMCACHE_PORT'];
                break;
        }
        self::$cache = new $obj();
        self::$cache->connect($_ENV['CACHE_HOST'], $port);
    }

    public static function set($key, $value)
    {
        self::$cache->set(base64_encode($key), json_encode($value));
    }

    public static function get($key)
    {
        return json_decode(self::$cache->get(base64_encode($key)), true);
    }


}