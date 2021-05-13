<?php 
	
require_once '../autoload.php';
class Paciente {

	private $db;

	function __construct(){
		$this->db = new database();
	}

}


?>