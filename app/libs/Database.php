<?php

namespace Sena\libs;

use PDO;

class Database{

    private $connection;

    public function __construct(){
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
            PDO::ATTR_DEFAULT_STR_PARAM =>PDO::FETCH_ASSOC
        ];

        $this->connection = "mysql:host=".constant('HOST')."; dbname=" . constant('DB'). "; charset=".constant('CHARSET');
        $this->connection = new PDO($this->connection, constant('USER'), constant('PASSWORD'), $options);
        $this->connection-> exec("SET CHARACTER SET UTF8");
    }

    public function getConnection(){
        return $this->connection;
    }

    public function closeConnection(){
        $this->connection = null;
    }
}
