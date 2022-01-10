<?php

namespace application\core;

class Router {

    protected $routes = [];
    protected $params = [];

    public function __construct() {
        $this->loadRoutes();
    }

    /*
     * Загрузка переданных маршрутов из application\core\routes.php
     */
    public function loadRoutes() {
        $arr = require 'application/config/routes.php';

        foreach ($arr as $key => $value) {
            $this->addRoute($key, $value);
        }
    }

    /*
     * Добавление маршрута
     */
    public function addRoute($route, $params) {
        $route = '#^'.$route.'$#';  // позволяют перехватить строку, которая начинается и заканчивается строкой из $route.
        $this->routes[$route] = $params;
    }

    /*
    * Проверка маршрута
    */
    public function checkRoute() {
        $url = $_SERVER['REQUEST_URI']; // получает основной путь без полного url
        $url = trim($url, '/');

        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $checked)) {  // Если найдены совпадения текущего маршрута и маршрута из $routes.php через регулярку, то запишет в текущую переменную и вернет true.
                $this->params = $params;

                return true;
            }
        }

        return false;
    }

    /*
    * Перенаправление маршрута
    */
    public function redirectToRoute() {
        if ($this->checkRoute()) {
            $routeController = ucfirst($this->params['controller']);
            $controller = 'application\controllers\\'.$routeController.'.php';

            if (class_exists($controller)) {
                echo 'Найден контроллер';
            } else {
                echo 'Ошибка! Не найден контроллер: '.$controller;
            }
        } else {
            echo 'Редирект на 404';
        }
    }
}