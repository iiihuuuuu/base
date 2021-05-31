<?php

namespace App\Controllers; 
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\Paciente;

final class DadosPaciente{

	private $p;

	public function __construct(){
		$this->p = new Paciente();
	}

	public function autoComplete(){
		$this->p->autoComplete('paciente', $_POST['form']);
	}

	public function dadosPaciente(){
		$res = $this->p->dadosPaciente(array_column($_POST['form'], "value"));
		if(empty($res)){ return "OK"; }
	}

	public function buscarDados(){
		return json_encode($this->p->buscarDados($_POST['value']));
	}

}

?>