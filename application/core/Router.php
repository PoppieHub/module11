<?php

namespace application\core;

class Router {

    protected $routes = [];
    protected $params = [];

    public function __construct() {
        //echo ' 2133243';
    }

    /*
     * Добавление маршрута
     */
    public function add() {
        //
    }

    /*
    * Проверка маршрута
    */
    public function check() {
        //
    }

    /*
    * Перенаправление маршрута
    */
    public function redirect() {
        return ' run';
    }
}