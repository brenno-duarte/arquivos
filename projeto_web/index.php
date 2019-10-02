<?php

header('Content-Type: text/html; charset=utf-8');

session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'Config.php';
require 'dependences.php';
require 'rotas/rota-login.php';
require 'rotas/rota-painel.php';
require 'rotas/rota-imoveis.php';
require 'rotas/rota-resultados.php';
require 'rotas/rota-conta.php';
require 'rotas/rota-recSenha.php';
require 'rotas/rota-rodape.php';

$app->run();
