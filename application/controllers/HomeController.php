<?php

namespace application\controllers;

use application\core\AbstractController;

class HomeController extends AbstractController {

    public function indexAction() {
        //$this->view->path = 'home/main';
        //$this->view->layout = 'custom';

        $params = [
            'id' => true,
        ];

        //dd($this->model->getAuthor($params));

        $forRender = parent::renderDefult();
        $forRender['hello'] = 'Визитка на мини mvc';
        $forRender['age'] = 22;
        $forRender['firstName'] = 'Андрей';
        $forRender['surname'] = 'Королев';
        $forRender['city'] = 'Челябинск';

        $this->view->render($forRender);

    }
}