<?php


namespace Core\Libs;

use ArrayAccess;


class Registry implements ArrayAccess
{

    protected static $container = [];


    public function offsetSet($key, $value)
    {
        if (!$this->offsetExists($key))
        {
            self::$container[$key] = $value;
        } else {
            trigger_error("This key is exists", E_USER_WARNING);
        }
    }

    public function offsetGet($key)
    {
        if ($this->offsetExists($key))
        {
            return self::$container[$key];
        } else {
            return trigger_error("No such key exists", E_USER_WARNING);
        }
    }

    public function offsetUnset($key)
    {
        if ($this->offsetExists($key))
        {
            unset(self::$container[$key]);
        } else
            {
            trigger_error("This key is not exists", E_USER_WARNING);
            }
    }

    public function offsetExists($key)
    {
        return array_key_exists($key, self::$container);
    }

}

