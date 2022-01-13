<?php

namespace application\lib;

use PDO;

class Db {

    protected PDO $db;

    public function __construct() {
       $config = require 'application/config/dbConnect.php';

       return $this->db = new PDO('mysql:host='.$config['hostName'].';dbname='.$config['dbName'], $config['login'], $config['password']);
    }

    public function query($sqlQuery, $params = []) {
        $query = $this->db->prepare($sqlQuery);

        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $query->bindValue(':'.$key, $value);
            }
        }

        $query->execute();

        return $query;
    }

    /*
     * PDO::FETCH_ASSOC: возвращает массив, индексированный именами столбцов результирующего набора
     */
    public function haveMany($sqlQuery, $params = []) {
        $result = $this->query($sqlQuery, $params);

            return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function hasOne($sqlQuery, $params = []) {
        $result = $this->query($sqlQuery, $params);

        return $result->fetchColumn();
    }

}