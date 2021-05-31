<?php 

namespace App\Controllers;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\Login as Login;

final class DadosLogin {

	private $login;

	public function __construct(){
		$this->login = new Login();
	}

	public function dashboard(Request $request, Response $response, array $args): Response {
		return $response->withRedirect('../base/public/dashboard.php');
	}

	public function dadosLogin() {
		$login = $_POST['form'][0]['value'];
		$senha = $_POST['form'][1]['value'];
		return $this->login->authLogin($login, $senha);
	}

	public function logout(Request $request, Response $response, array $args){
		session_start();
		session_unset();
		session_destroy();
		return $response->withRedirect('../base');
	}
}

 ?>