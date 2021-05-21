<?php

namespace App\Model;

use \PDO;
use \PDOException;

abstract class Database{
    
    const HOST = "localhost";
    const NAME = "db_vacinas";
    const USER = "root";
    const PASS = "";

    public function __construct(){
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);          
        } catch (PDOException $e) {
            die('ERROR: '.$e->getMessage());
        }
    }
}
