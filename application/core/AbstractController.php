<?php

namespace application\core;

use application\core\View;

abstract class AbstractController {

    public $view, $route;

    public function __construct($route) {
        $this->route = $route;
        $this->view = new View($route);
    }

    public function renderDefult() {

        return [
            'title' => 'Визитка',
        ];
    }
}