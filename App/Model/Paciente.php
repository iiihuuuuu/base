<?php

namespace App\Model;
use App\Model\Database;

class Paciente{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function autoComplete($table, $value){
        if(strlen($value) > 3){
            $data = $this->db->select($table, "cpf LIKE '%".$value."%'");

            foreach ($data as $item) {
                echo "<option value=".$item['id'].">".$item['cpf']."</option>";
            }
        }
    }

}
