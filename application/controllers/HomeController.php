<?php

namespace application\controllers;

use application\core\AbstractController;
use application\lib\Db;

class HomeController extends AbstractController {

    public function indexAction() {
        //$this->view->path = 'home/main';
        //$this->view->layout = 'custom';

        $db = new Db();

        $params = [
            'id' => 1,
        ];

        dd($db->haveMany('SELECT * FROM author WHERE author = :id', $params));

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