<?php
// DIC configuration

$container = $app->getContainer();

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__.'/../templates', [
        'cache' => false, //'cache'
        'debug' => true
    ]);
    $view->addExtension(new \Slim\Views\TwigExtension(
        $container['router'],
        $container['request']->getUri()
    ));
    $view->addExtension(new Twig_Extension_Debug());

    return $view;
};

$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
            return $c->view->render($response, '404.twig') 
                ->withStatus(404)
                ->withHeader('Content-Type', 'text/html');
        };
};