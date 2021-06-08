<?php 

namespace App\Model;
use App\Model\Database;

session_start();
class Login {

	private $db;

	public function __construct(){
		$this->db = new Database();

	}

	public function authLogin($login, $senha){
		$res = $this->db->select('profissionais', "login = '$login'", "senha = '$senha'", "ativo = 1");
		
		if(count($res) > 0){
			$_SESSION['login'] = $login;
			$_SESSION['senha'] = $senha;

			return 'Authenticated';

		}else{
			return 'Not Authenticated';	
		}
	}


}


 ?>