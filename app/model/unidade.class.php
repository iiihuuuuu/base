<?php

require_once 'database.class.php';

class Unidade {

    private $db;
    
    public function __construct(){
        $this->db = new Database();
    } 

    public function login(){    	
		if(isset($_POST['login'])){
			if($_POST['password'] != ""){

				$login = $_POST['hosp'];
				$queryRow = "SELECT login FROM tb_unidades WHERE login = '$login'";
				$row 	  = $this->db->runRow($queryRow);

				if($row >= 1){
					$password = $_POST['password'];
					$querySelect = "SELECT e.id, e.login, e.nome_do_estabelecimento, e.senha, e.ativo FROM tb_unidades e WHERE e.login = '$login' AND ativo = 1";
					$res   = $this->db->runSelect($querySelect);
					
					session_start();
					foreach ($res as $item) {
						$_SESSION['id'] = $item['id'];
						$_SESSION['login'] = $item['login'];
						$_SESSION['hosp'] = $item['nome_do_estabelecimento'];
						$hash = $item['senha'];
						$ativo = $item['ativo'];
					}
					if($login == $_SESSION['login'] && password_verify($password, $hash) && $ativo == 1){
						$_SESSION['password'] = $password;
						header('Location: ../public/home.php');
					}
				}
			}
		}
	}

}