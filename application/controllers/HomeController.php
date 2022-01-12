<?php

namespace application\controllers;

use application\core\AbstractController;

class HomeController extends AbstractController {

    public function indexAction() {
        //$this->view->path = 'home/main';
        //$this->view->layout = 'custom';

        $hello = 'Визитка на мини mvc';
        $age = 22;
        $firstName = 'Андрей';
        $surname = 'Королев';
        $city = 'Челябинск';


        $forRender = parent::renderDefult();

        $this->view->render( [
            'title' => $forRender['title'],
            'hello' => $hello,
            'age' => $age,
            'firstName' => $firstName,
            'surname' => $surname,
            'city' => $city,
        ]);
    }
}