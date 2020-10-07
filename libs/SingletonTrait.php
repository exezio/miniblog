<?php


namespace Libs;


trait SingletonTrait
{

    public static $instance;

    public static function instance()
    {
        if (self::$instance === null) self::$instance = new self;
        return self::$instance;
    }

}