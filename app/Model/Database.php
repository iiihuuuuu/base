<?php

namespace App\Model;

use \PDO;
use \PDOException;

class Database{
    
    const HOST = "localhost";
    const NAME = "db_vacinas";
    const USER = "root";
    const PASS = "";

    private $table;
    private $connection;

    function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection(){
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);          
        } catch (PDOException $e) {
            die('ERROR: '.$e->getMessage());
        }
    }


    public function execute($query, $params = []){
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->execute($params);
            echo "OK";
            return $stmt;
        } catch (PDOException $e) {
            die('ERROR: '.$e->getMessage());
        }
    }

    public function create($values){
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');    
        $query = 'INSERT INTO '.$this->table.' ('.implode(',', $fields).') VALUES('.implode(',', $binds).')';
        $this->execute($query, array_values($values));
        return $this->connection->lastInsertId();
    }




    //echo "<pre>"; print_r($query); echo "</pre>"; exit;
}
