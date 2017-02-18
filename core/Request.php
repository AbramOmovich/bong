<?php
namespace Core;

class Request
{
    public static function path()
    {
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    }

    public static function requestMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function back()
    {
        $url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
        
        header('Location: ' . $url);
    }
}