<?php
namespace Core;

class App
{
    private static $app = [];

    /**
     * @return mixed
     */
    public static function get($key)
    {
        return self::$app[$key];
    }

    /**
     * @param mixed $app
     */
    public static function set($key, $app)
    {
        self::$app[$key] = $app;
    }

    /**
     * @return array
     */
    public static function getConf()
    {
        return self::$app;
    }
}