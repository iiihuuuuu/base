<?php

namespace App\Model;

use \PDO;
use \PDOException;

class Database{
    
    const HOST = "localhost";
    const NAME = "db_amosaude";
    const USER = "root";
    const PASS = "";

    private $connection;

    public function __construct(){
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);          
        } catch (PDOException $e) {
            die('ERROR: '.$e->getMessage());
        }
    }

    public function select($table, $where = null, $and = null, $order = null, $limit = null, $fields = '*'){
        $where = strlen($where) ? 'WHERE '   .$where : '';
        $and   = strlen($and)   ? 'AND '     .$and   : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '   .$limit : '';

        $query = "SELECT $fields FROM $table $where $and $order $limit";
        
        $stm = $this->connection->prepare($query);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizarDados($table, $values, $where, $and = null): string{
        $and    = strlen($and) ? ' AND '.$and : '';
        $fields = array_keys($values);    
        
        $query  = "UPDATE $table SET ".implode(" = ?, ", $fields)." = ? WHERE $where $and";
        
    }

    public function insert($table, $values): string{
        $fields = array_keys($values);
        $binds  = array_pad([], count($fields), '?');    
        
        $query  = "INSERT INTO $table (".implode(',', $fields).") VALUES(".implode(',', $binds).")";
        
        try {
            $stm = $this->connection->prepare($query);
            $stm->execute(array_values($values));
            return 'Inserido com Sucesso!';
        } catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
            return 'Erro ao tentar inserir os dados';
        }
    }
}
    