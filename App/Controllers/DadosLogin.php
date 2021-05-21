<?php 

namespace App\Controllers;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\Login;

class DadosLogin {

	private $db;

	public function __construct(){
	}

	public function login(Request $request, Response $response, array $args): Response {
		return $response->withRedirect('../base/public/login.php');
	}
}

 ?>