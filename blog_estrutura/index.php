<?php

header('Content-Type: text/html; charset=utf-8');

session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'Config.php';
require 'dependences.php';
require 'rotas/rota-admin.php';
require 'rotas/rota-login.php';
require 'rotas/rota-noticia.php';
require 'rotas/rota-usuarios.php';
require 'rotas/rota-recSenha.php';
require 'rotas/rota-rodape.php';

$app->run();
