<?php 

namespace App\Model;
use App\Model\Database;

class Login {

	private $db;

	public function __construct(){
		$this->db = new Database();

	}

	public function authLogin($login, $senha){
		$res = $this->db->select('profissionais', "login = '$login'", "senha = '$senha'", "ativo = 1");
		$auth = count($res) > 0 ? "Authenticated" : "Not Authenticated";

		return $auth;
	}
}


 ?>