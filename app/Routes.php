<?php

// app/Routes.php

class Routes {
    private static $routes = [];

    public static function addRoute($method, $path, $controller, $action) {
        self::$routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'action' => $action,
        ];
    }

    public static function getRoutes() {
        return self::$routes;
    }

    public static function matchRoute($method, $path) {
        foreach (self::$routes as $route) {
            if ($route['method'] === $method && $route['path'] === $path) {
                return $route;
            }
        }
        return null;
    }

    public static function dispatch($method, $path) {
        $route = self::matchRoute($method, $path);
        if ($route) {
            $controller = new $route['controller']();
            $action = $route['action'];
            $controller->$action();
        } else {
            echo '404 Not Found';
        }
    }
}