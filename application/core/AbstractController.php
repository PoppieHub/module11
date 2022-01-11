<?php

namespace application\core;

abstract class AbstractController {

    public function renderDefult() {

        return [
            'title' => 'Сайт-визитка',
        ];
    }
}