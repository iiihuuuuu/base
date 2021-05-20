<?php

use Psr\Container\ContainerInterface;
use Slim\Views\PhpRenderer;
// ...

return [

    // ...

    PhpRenderer::class => function (ContainerInterface $container) {
        return new PhpRenderer($container->get('settings')['view']['path']);
    },

];