<?php

namespace App\Model;
use App\Model\Database;

class Paciente extends Database{

    private $db;
    private $id;

    public $nome;
    public $telefone;
    public $numero;

    public function __construct(){
        parent::__construct();
    }
    //     public function execute($query, $params = []){
    //     try {
    //         $stmt = $this->connection->prepare($query);
    //         $stmt->execute($params);
    //         echo "OK";
    //         return $stmt;
    //     } catch (PDOException $e) {
    //         die('ERROR: '.$e->getMessage());
    //     }

    public function create($values){
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');    
        $query = 'INSERT INTO '.$this->table.' ('.implode(',', $fields).') VALUES('.implode(',', $binds).')';
        //$this->execute($query, array_values($values));
        //return $this->connection->lastInsertId();
    }

    public function select(): array{
        $query = "SELECT * FROM vw_ultimas_datas";
        $stm = $this->connection->prepare($query);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
}