<?php 

//Funções
use function slim\{slimConfiguration, basicAuth};

//Classes
use App\Controllers\DadosPaciente;

//Atribui a função chamada, na qual possui o container
$app = new \Slim\App();

$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer('path/to/templates/with/trailing/slash/');
};

$app->get('/hello', function ($request, $response, $args) {
    return $this->view->render('../index.php');
});

$app->group('', function() use ($app) {
	
	//View
	$app->get('/buscarDados', DadosPaciente::class . ':buscarDados');
	$app->map(['get', 'post'], '/inserirDados', DadosPaciente::class . ':inserirDados');
	$app->map(['get', 'post', 'put'], '/atualizarDados', DadosPaciente::class . ':atualizarDados');

})->add(basicAuth());

//$render->run();

$app->run();
?>