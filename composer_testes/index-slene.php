<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'vendor/autoload.php';
require 'config.php';

use Katrina\Katrina as Katrina;

$app = new App\Slene\Slene();

#echo '<pre>';

$app->get('/requisicao', function() {
    
    #request()->basicAuth("brenno", "123", "acesso");
    #request()->getMethod();
    #request()->getScheme();
    #request()->getUrl();
    #request()->getParams();
    #request()->getParam("param");
    #request()->setHeader("type", "value");

});

$app->get('/response', function() {
    
    #response()->write("string");
    #response()->onJson($array);
    #response()->redirect("https://microsoft.com.br", 200);
    response()->write(response()->hasHeader());

});

$app->match();