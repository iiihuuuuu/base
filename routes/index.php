<?php 

//Funções
use function slim\{slimConfiguration, basicAuth};

//Classes
use App\Controllers\DadosPaciente;
use App\Controllers\Views;

//Atribui a função chamada, na qual possui o container
$app = new \Slim\App();

$app->group('', function() use ($app) {
	
	//View
	$app->get('/home', Home::class);

	$app->get('/buscarDados', DadosPaciente::class . ':buscarDados');
	$app->map(['get', 'post'], '/inserirDados', DadosPaciente::class . ':inserirDados');
	$app->map(['get', 'post', 'put'], '/atualizarDados', DadosPaciente::class . ':atualizarDados');

})->add(basicAuth());

//$render->run();

$app->run();
?>