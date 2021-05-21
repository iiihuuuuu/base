<?php


putenv('DISPLAY_ERRORS_DETAILS='. true);
require_once 'vendor/autoload.php';
require_once 'slim/slimConfiguration.php';
require_once 'slim/basicAuth.php';
//require_once 'routes/index.php';
//Funções
use function slim\{slimConfiguration, basicAuth};

//Classes
use App\Controllers\DadosPaciente;
use App\Controllers\DadosLogin;

//Atribui a função chamada, na qual possui o container
$app = new \Slim\App(slimConfiguration());
	

$app->get('/', DadosLogin::class . ':login');

$app->group('', function() use ($app) {

	$app->get('/buscarDados', DadosPaciente::class . ':buscarDados');
	$app->map(['get', 'post'], '/inserirDados', DadosPaciente::class . ':inserirDados');
	$app->map(['get', 'post', 'put'], '/atualizarDados', DadosPaciente::class . ':atualizarDados');

})->add(basicAuth());
$app->run();

?>