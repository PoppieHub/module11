<?php

namespace application\models;

use application\core\Model;

class Home extends Model {

    public function getJson(): string
    {

        return '{
            "title": "Визитка на мини mvc",
            "description": "Визитка построена на собственно реализованном mvc фреймворке. Условия задания очень детские и шаблон, на котором как понял нужно дать ответ, очень плох. Поэтому решил что-то поинтереснее сделать). Не знаю зачем это пишу, бла бла бла бла..."
        }';
    }

    public function getPeriodsOfLife(): string
    {
        return $this->db->hasOne('SELECT json FROM periodoflife');
    }

    public function getAuthor($params): bool|array
    {
        return $this->db->haveMany('SELECT * FROM home WHERE author = :id', $params);
    }

    public function getAge($birthday) {

        $diff = date( 'Ymd' ) - date( 'Ymd', strtotime($birthday) );

        return substr( $diff, 0, -4 );
    }

    public function daysBetween($dt1, $dt2) {
        return date_diff(
            date_create($dt2),
            date_create($dt1)
        )->format('%a');
    }


}