<?php

namespace application\controllers;

use application\core\AbstractController;
use application\models\PeriodOfLife;

class HomeController extends AbstractController {

    public function indexAction() {
        //$this->view->path = 'home/main';
        //$this->view->layout = 'custom';

        $params = [
            'id' => true,
        ];

        $json = json_decode($this->model->getJson(), true);

        $forRender = parent::renderDefult();

        if (!empty($json)) {
            $forRender['hello'] = $json['title'];
            $forRender['description'] = $json['description'];
        }

        foreach ($this->model->getAuthor($params) as $value) {

            if ($value['firstName'] && $value['lastName']) {
                $forRender['firstName'] = $value['firstName'];
                $forRender['lastName'] = $value['lastName'];
            }

            if ($value['city'] || $value['age']) {
                $forRender['birthDays'] = $this->model->daysBetween($value['birth'], date('Y/m/d', time()));
                $forRender['age'] = $this->model->getAge($value['birth']);
                $forRender['city'] = $value['city'];
            }

        }

        $period = json_decode($this->model->getPeriodsOfLife(), true);

        foreach ($period as $value) {

            if ($forRender['age'] <= $value['periodUpTo'] && $value['periodFrom'] === 'none') {
                $forRender['ageDescription'] = $value['namePeriod'];
                break;
            } else if ($value['periodFrom'] <= $forRender['age'] && $value['periodUpTo'] === 'none') {
                $forRender['ageDescription'] = $value['namePeriod'];
                break;
            } else if ($value['periodFrom'] <= $forRender['age'] && $forRender['age'] <= $value['periodUpTo']) {
                $forRender['ageDescription'] = $value['namePeriod'];
                break;
            }
        }

        $this->view->render($forRender);

    }

    public function portfolioAction() {

        $forRender = parent::renderDefult();
        $forRender['portfolio'] = $this->model->getPortfolio();

        $this->view->render($forRender);
    }
}