<?php 

//Funções
use function slim\{slimConfiguration, basicAuth};

//Classes
use App\Controllers\DadosPaciente;

//Atribui a função chamada, na qual possui o container
$app = new \Slim\App(slimConfiguration());

$app->group('', function() use ($app) {
	
	$app->get('/buscarDados', DadosPaciente::class . ':buscarDados');
	$app->map(['get', 'post'], '/inserirDados', DadosPaciente::class . ':inserirDados');
	$app->map(['get', 'post', 'put'], '/atualizarDados', DadosPaciente::class . ':atualizarDados');

})->add(basicAuth());

$app->run();
?>