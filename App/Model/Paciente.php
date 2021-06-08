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
            $data = $this->db->select($table, "cpf LIKE '%".$value."%'", null, null, 5);

            foreach ($data as $item) {
                echo "<option value=".$item['id'].">".$item['cpf']."</option>";
            }
        }
    }

    public function buscarDados($dados){
        return $this->db->select('paciente', "id = ".$dados);
    }

    public function dadosPaciente($dados){
        $this->db->insert('paciente', [
            'nome' => $dados[3]
        ]);
        //var_dump($dados);
    }

}
