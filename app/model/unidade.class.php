<?php

require_once 'database.class.php';

class Unidade {

    private $db;
    
    public function __construct(){
        $this->db = new Database();
    } 
    
    public function carregarUnidades(){
	    $conn  = new Database();
	    $query = "SELECT id, nome_do_estabelecimento, ativo FROM tb_unidades WHERE ativo = 1 ORDER BY nome_do_estabelecimento ASC";
	    $res   = $conn->runSelect($query);

	    foreach ($res as $item) {
	        echo "<option value='".$item['id']."'>".$item['nome_do_estabelecimento']."</option>";
	    }
    }

    public function login(){    	
		if(isset($_POST['login'])){
			if($_POST['password'] != ""){

				$login = $_POST['hosp'];
				$password = $_POST['password'];
				$queryRow = "SELECT login FROM tb_unidades WHERE login = '$login'";
				$row 	  = $this->db->runRow($queryRow);

				if($row >= 1){
					$querySelect = "SELECT e.id, e.login, e.nome_do_estabelecimento, e.senha, e.ativo FROM tb_unidades e WHERE e.login = '$login' AND ativo = 1";
					$res   = $this->db->runSelect($querySelect);
					
					foreach ($res as $item) {
						$loginn = $item['login'];				
						$hash = $item['senha'];
						$ativo = $item['ativo'];
					}
					if($login == $loginn && password_verify($password, $hash) && $ativo == 1){
						session_start();
						$_SESSION['id'] = $item['id'];
						$_SESSION['login'] = $item['login'];
						$_SESSION['hosp'] = $item['nome_do_estabelecimento'];
						$_SESSION['password'] = $password;
						header('Location: ../public/home.php');
					}else{
						echo "<script> alert('Usuário ou Senha inválido') </script>";
					}
				}else{
					echo "<script> alert('Usuário ou Senha inválido') </script> ";
				}
			}else{
				echo "<script> alert('Usuário ou Senha inválido') </script> ";
			}
		}
	}

}

?>