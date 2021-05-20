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

    public function insert($table, $values): string{
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');    
        $query = "INSERT INTO $table (".implode(',', $fields).") VALUES(".implode(',', $binds).")";
        
        //Preparando e inserindo
        try {
            $stm = $this->connection->prepare($query);
            $stm->execute(array_values($values));
            return 'Inserido com Sucesso!';
        } catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
            return 'Erro ao tentar inserir os dados';
        }
    }

    public function atualizarDados($table, $values, $where, $and = null): string{
        $and = strlen($and) ? ' AND '.$and : '';
        $fields = array_keys($values);    
        $query = "UPDATE $table SET ".implode(" = ?, ", $fields)." = ? WHERE $where $and";
        
        //Preparando e inserindo
        try {
            $stm = $this->connection->prepare($query);
            $stm->execute(array_values($values));
            return 'OK';
        } catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
            return 'Erro ao tentar atualizar';
        }
    }

    public function select($table, $where = null, $order = null, $limit = null, $fields = '*'): array{
        $where = strlen($where) ? ' WHERE '.$where : '';
        $order = strlen($order) ? ' ORDER BY '.$order : '';
        $limit = strlen($limit) ? ' LIMIT '.$limit : '';

        $query = "SELECT $fields FROM $table $where $order $limit";
        $stm = $this->connection->prepare($query);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
}