<?php

namespace App\Model;
require_once '../../vendor/autoload.php';
use \App\Model\Database;

class Paciente {

    private $db;
    private $id;

    public $nome;
    public $telefone;
    public $numero;

    public function __construct(){
        $this->db = new Database('vw_ultimas_datas');
    } 
    
    public function create() {
        $this->data = date('Y-m-d H:i:s');
        $this->id = $this->db->create([
            'id_tb_unidades' => $this->nome,
            'dh_ultimo_lancamento' => $this->telefone,
            'dh_penultimo_lancamento' => $this->numero
        ]);
    }
}