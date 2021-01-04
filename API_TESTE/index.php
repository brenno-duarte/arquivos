<?php

session_start();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

error_reporting(E_ALL);
ini_set("display_errors", 1);

// echo '<pre>';
// var_dump($_SERVER);

/*if (isset($_SERVER['PHP_AUTH_USER'])) {
    $auth['user'] = $_SERVER['PHP_AUTH_USER'];
    $auth['pass'] = $_SERVER['PHP_AUTH_PW'];
} elseif (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    $replace = str_replace("Basic", "", $_SERVER['HTTP_AUTHORIZATION']);
    $code = explode(":", base64_decode(trim($replace)));
    $auth['user'] = $code[0];
    $auth['pass'] = $code[1];
}

if ($auth['user'] != 'brenno' || $auth['pass'] != '123') {
    header('WWW-Authenticate: Basic realm="Solital HttpClient"');
    header('HTTP/1.0 401 Unauthorized');
    die("You are not allowed to access the router");
} else {
    header('WWW-Authenticate: Basic realm="Sistema de Testes"');
    header('HTTP/1.0 200 OK');

    echo "<p>Olá <strong>{$auth['user']}</strong>.</p>";
    echo "<p>Sua senha é <strong>{$auth['pass']}</strong>.</p>";

}*/

require 'Config.php';
require 'dependences.php';
require 'App/Controller/Controller.php';

$app->get('/usuarios', Controller::class. ':listar');
$app->get('/usuarios/{id}', Controller::class. ':listarUnico');
$app->post('/usuarios', Controller::class. ':inserir');
$app->put('/usuarios/{id}', Controller::class. ':alterar');
$app->delete('/usuarios/{id}', Controller::class. ':deletar');

$app->run();