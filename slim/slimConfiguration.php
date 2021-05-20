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

// function render(): \Slim\Container{
// 	// Get container
// 	$container = $app->getContainer();

// 	// Register component on container
// 	$container['view'] = function ($container) {
// 	    $view = new \Slim\Views\Twig('path/to/templates', [
// 	        'cache' => 'path/to/cache'
// 	    ]);

// 	    // Instantiate and add Slim specific extension
// 	    $router = $container->get('router');
// 	    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
// 	    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

// 	    return $view;
// 	};
// }

/**
 * get = recuperar
 * post = inserir
 * put = atualizar
 * delete = deletar
 */

 ?>