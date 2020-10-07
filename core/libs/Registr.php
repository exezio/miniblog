<?php


namespace Core\Libs;


class Registr
{

    protected static $container = [];

    public static function set($key, $value)
    {
        if (!isset(self::$container[$key]))
        {
            self::$container[$key] = $value;
        }
    }

    public static function get($key)
    {
        if (isset(self::$container[$key]))
        {
            return self::$container[$key];
        }
        return false;
    }

    public static function delete($key)
    {
        if (isset(self::$container[$key]))
        {
            unset(self::$container[$key]);
        }
        return false;
    }

}