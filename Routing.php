<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/ExcersiseGroupsController.php';

class Routing {
    public static $routes;

    public static function get($url, $controller) {
        self::$routes[$url] = $controller;
    }

    public static function post($url, $controller) {
        self::$routes[$url] = $controller;
    }

    public static function run($url) {
        $action = join("", explode('/', $url));
        $action = explode('?', $action)[0];

        if (!array_key_exists($action, self::$routes)) {
            die('Wrong URL!');
        }

        $controller = self::$routes[$action];
        $action = join("", explode('-', $action));
        $object = new $controller;
        $object->$action();
    }
}