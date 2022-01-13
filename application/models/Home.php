<?php

namespace application\models;

use application\core\Model;

class Home extends Model {

    public function getAuthor($params): bool|array
    {
        return $this->db->haveMany('SELECT * FROM home WHERE author = :id', $params);
    }

}