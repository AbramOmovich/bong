<?php
namespace Core;

use Controllers;

class Route
{
    protected static $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function run()
    {
        $router = new self;
        require_once "routes.php";

        return $router;
    }

    public function get($url, $path)
    {
        self::$routes['GET'][$url] = $path;
    }

    public function post($url, $path)
    {
        self::$routes['POST'][$url] = $path;
    }

    public function proccess()
    {
        $path = Request::path();
        $method = Request::requestMethod();

        if(array_key_exists($path, self::$routes[$method])) {
            $this->callController(... explode('@', self::$routes[$method][$path]));
        }else{
            header('HTTP/1.1 404 Not Found');
            require_once "views/error/404.php";
        }
    }

    /**
     * @param $class
     * @param $method
     *
     * @return $this
     */
    protected function callController($class, $method)
    {
        $class = 'Controllers\\'. $class;
        call_user_func_array([new $class, $method], []);

        return $this;
    }
}