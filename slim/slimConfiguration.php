<?php 

namespace slim;

/**
 * Container da aplicação
 */
function slimConfiguration(): \Slim\Container {
	$configuration = [
		'settings' => [
			'displayErrorDetails' => getenv('DISPLAY_ERRORS_DETAILS'),
		],
	];
	return new \Slim\Container($configuration);
}
/**
 * get = recuperar
 * post = inserir
 * put = atualizar
 * delete = deletar
 */

 ?>