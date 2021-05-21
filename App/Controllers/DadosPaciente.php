<?php

namespace App\Controllers; 
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use Slim\Views\PhpRenderer as PhpRenderer;

use App\Model\Paciente;
use League\Plates\Engine;


class DadosPaciente{

	/** @var Engine */
	private $p;
	private $view;

	public function __construct($router){
	private $renderer;

	public function __construct(){
		$this->p = new Paciente();
		$this->view = Engine::create(dirname(__DIR__, 2). "/theme", "php");
		$this->view->addData(["router" => $router]);
	}

	public function home(): void{
		//echo $this->view->loadExtension(new League\Plates\Extension\Asset)
		echo $this->view->render("login", []);

		//var_dump($aa);
	}

	public function inserirDados(Request $request, Response $response): Response{
	public function home(PhpRenderer $renderer, Request $request, Response $response): Response{
		$this->renderer = $renderer;
		$this->renderer->setLayout('../../views/layout.php');
		return $this->renderer->render($response, '../../dashboard.php', ['name'=> "World"]);

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

	public function buscarDados(): array{
		
		$this->p->select('vw_ultimas_datas');
		//return $response->withJson($res);

		$res = $this->p->select('tb_lancamentos');
		return $response->withJson($res);
	}

	public function atualizarDados(): void {

		$this->p->atualizarDados('vw_ultimas_datas', 
			[
				'id_tb_unidades' => 4,
			],
			'id_tb_unidades = '. 1
		);
		//return $response->withJson($res);
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