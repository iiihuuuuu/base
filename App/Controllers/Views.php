<?php

namespace App\Action;

namespace App\Controllers; 
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer as PhpRenderer;

class Home
{
    /**
     * @var PhpRenderer
     */
    private $renderer;

    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response): Response {
        $this->renderer->setLayout('../../views/layout.php');
        return $this->renderer->render($response, '../../views/dashboard.php', ['name' => 'World']);
    }
}