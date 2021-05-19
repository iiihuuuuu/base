<?php

namespace App\Controllers; 
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\Paciente;


class DadosPaciente{

	private $p;

	public function __construct(){
		$this->p = new Paciente();
	}

	public function inserirDados(Request $request, Response $response, array $args): Response {

		$this->p->nome = 1;
		$this->p->telefone = "2021/01/05";
		$this->p->numero = "2021/05/18";
		$response = $this->p->create();

		return $response;
	}

	public function buscarDados(Request $request, Response $response, array $args): Response {
		
		$res = $this->p->select();
		$response = $response->withJson($res);

		return $response;
	}
}






//require_once '../../vendor/autoload.php';

// use \App\Model\Paciente;
// if(!empty($_POST['p'])){
// 	$p = $_POST['p'];
// 	$paciente = new Paciente;
// 	for($i=0; $i < count($p); $i++){
// 		if($p[$i]["name"] == "nomePaciente"){ $paciente->nome = $p[$i]['value']; }
// 		if($p[$i]['name'] == "telefone"){ $paciente->telefone = $p[$i]['value']; }
// 		if($p[$i]['name'] == "celular"){ $paciente->numero = $p[$i]['value']; }
// 	}
// 	$paciente->create();
// }

?>