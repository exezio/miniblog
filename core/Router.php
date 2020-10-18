<?php


namespace Core;




class Router
{

    private static $routes = [];
    private static $route = [];
    private static $getParams = [];


    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function getRoute()
    {
        return self::$route;
    }

    public static function getParams()
    {
        return self::$getParams;
    }

    public static function dispatch($url)
    {
        if (self::matchRoute($url))
        {
            $controller = 'App\Controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
            $action = self::$route['action'] . 'Action';
            if (class_exists($controller))
            {
                $controllerObj = new $controller(self::$route);
                if (method_exists($controllerObj, $action)) $controllerObj->$action();
                $controllerObj->getView();
            } else {
                trigger_error("Контроллер {$controller} не найден", E_USER_WARNING);
            }
        } else {
            http_response_code(404);
            include '404.html';
        }
    }

    private static function matchRoute($url)
    {
        $url = self::urlForMatch($url);
        foreach (self::$routes as $pattern => $route)
        {
            if (preg_match("#$pattern#", $url, $matches))
            {
                foreach ($matches as $key => $value)
                {
                    if (is_string($key))
                    {
                        $route[$key] = $value;
                    }
                }
                if(isset($route['prefix'])) $route['prefix'] .= '\\';
                else $route['prefix'] = '';
                $route['action'] = self::actionForRoute($route['action']) ?: 'index';
                $route['controller'] = self::controllerForRoute($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    private static function urlForMatch($url)
    {
        $urlString = parse_url($url);
        if (isset($urlString['query']) && $urlString['query'])
        {
            parse_str($urlString['query'], $getArray);
            self::$getParams = $getArray;
        }
        return trim($urlString['path'], '/');
    }

    private static function actionForRoute($action)
    {
        return lcfirst(str_replace(' ', '', ucwords(str_replace('-', ' ', $action))));
    }

    private static function controllerForRoute($controller)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $controller)));
    }

}