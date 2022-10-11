<?php

session_start();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'Config.php';
require 'dependences.php';
require 'App/Controller/Controller.php';

$app->get('/usuarios/listar/', Controller::class. ':listar');
$app->get('/usuario/{id}', Controller::class. ':listarUnico');
$app->post('/usuarios', Controller::class. ':inserir');
$app->put('/usuarios/{id}', Controller::class. ':alterar');
$app->delete('/usuarios/{id}', Controller::class. ':deletar');

$app->run();