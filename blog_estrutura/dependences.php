<?php

require_once 'vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

$container = $app->getContainer();

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('views', [
        'cache' => false
    ]);

    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $view;
};

$container['flash'] = function () {
    return new \Slim\Flash\Messages();
};

# PERSONALIZAÇÃO DE ERROS, OCULTADO EM PRODUÇÃO

/*$container['errorHandler'] = function ($container) {
    return function ($request, $response, $exception) use ($container) {
        return $response->withStatus(500)->write('<h1>Erro na requisição</h1><p>Houve um erro interno no servidor<p>');
    };
};*/