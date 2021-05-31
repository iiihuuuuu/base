<?php


putenv('DISPLAY_ERRORS_DETAILS='. true);
require_once 'vendor/autoload.php';
require_once 'slim/slimConfiguration.php';
require_once 'slim/basicAuth.php';
//require_once 'routes/index.php';
//Funções
use function slim\{slimConfiguration, basicAuth};

//Classes
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Controllers\DadosPaciente;
use App\Controllers\DadosLogin;
use Slim\Views\PhpRenderer;

//Atribui a função chamada, na qual possui o container
$app = new \Slim\App(slimConfiguration());

$container = $app->getContainer();
$container['view'] = [
	'pagina' => new \Slim\Views\PhpRenderer('./public')
];

$app->group('/', function() use ($app){

	$app->get('', function(Request $request, Response $response, array $args) {
		$this->view['pagina']->render($response, 'login.php');
	});

	$app->get('dashboard', function(Request $request, Response $response) {
		$this->view['pagina']->render($response, 'dashboard.php');
	});


})->add(basicAuth());
	
$app->group('/app', function() use ($app) {
	
	//Requisição Login
	$app->post('/dadosLogin', DadosLogin::class . ':dadosLogin');
	
	$app->get('/logout', DadosLogin::class . ':logout');
	
	
	//Requisição Paciente
	$app->post('/dadosPaciente', DadosPaciente::class . ':dadosPaciente');
	
	$app->post('/autoComplete', DadosPaciente::class . ':autoComplete');
	
	$app->post('/buscarDados', DadosPaciente::class . ':buscarDados');

	// $app->map(['get', 'post'], '/inserirDados', DadosPaciente::class . ':inserirDados');

})->add(basicAuth());
$app->run();

?>