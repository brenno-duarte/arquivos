<?php

session_start();

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

spl_autoload_register(function($class){
	include 'classes/'. $class . '.php';
});

require_once 'vendor/autoload.php';


$app = new \Slim\App([
	'settings' => [
		'displayErrorDetails' => true
	]
]);

// Get container
$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('views', [
        'cache' => false
    ]);
    
    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new Slim\Views\TwigExtension(
    	$container->router,
    	$container->request->getUri()
    ));

    return $view;
};

$app->run();