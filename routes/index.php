<?php 

//Use no arquivo da classe
use function slim\slimConfiguration;
use App\Controllers\DadosPaciente;

//Atribui a função chamada, na qual possui o container
$app = new \Slim\App(slimConfiguration());

$app->get('/buscarDados', DadosPaciente::class . ':buscarDados');

$app->run();
?>