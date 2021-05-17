<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
require_once 'vendor/autoload.php';	
// if($_GET){
// 	$url = explode('/', $_GET['url']);
// 	require_once $url[0].'.php';
// }

$app = new \Slim\App();

$app->get('/prod', function(Request $req, Response $res, array $args){
	$limit = $req->getQueryParams()['limit'] ?? 5;
	return $res->getBody()->write("{$limit} produtos do banco de dados");
});
$app->run();


?>