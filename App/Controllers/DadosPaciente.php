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


		$this->p->insert('vw_ultimas_datas', 
			[
				'id_tb_unidades' => 5,
				'dh_ultimo_lancamento' => '2021/04/04',
				'dh_penultimo_lancamento' => '2021/05/20'
			]
		);
		return $response->withJson($res);
	}

	public function buscarPaciente(){
		$this->p->autoComplete('paciente', $_POST['form']);
	}

	public function atualizarDados(Request $request, Response $response, array $args): Response{

		$this->p->atualizarDados('vw_ultimas_datas', 
			[
				'id_tb_unidades' => 4,
			],
			'id_tb_unidades = '. 1
		);
		return $response->withJson($res);
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