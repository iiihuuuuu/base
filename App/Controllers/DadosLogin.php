<?php 

namespace App\Controllers;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\Login as Login;

class DadosLogin {

	private $login;

	public function __construct(){
		$this->login = new Login();
	}

	public function login(Request $request, Response $response, array $args): Response {
		return $response->withRedirect('../base/public/login.php');
	}

	public function dashboard(Request $request, Response $response, array $args): Response {
		return $response->withRedirect('../base/public/dashboard.php');
	}

	public function dadosLogin() {
		$login = $_POST['form'][0]['value'];
		$senha = $_POST['form'][1]['value'];
		return $this->login->authLogin($login, $senha);
	}
}

 ?>