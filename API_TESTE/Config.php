<?php

# Caminho completo do projeto
define('ROOT_PATH', dirname(__FILE__));

# Configurações do banco
define('DB_CONFIG', [
    'drive' => 'mysql',
    'host' => 'localhost',
    'dbname' => 'db_teste',
    'user' => 'root',
    'pass' => ''
]);

# OpenSSL
define('SECRET_IV', pack('a16', 'h3ll0w0rld@crypt'));
define('SECRET', pack('a16', 'h3ll0w0rld@s3c0ndcrypt'));

# PHPMailer
define('MAIL', [
    'host' => 'smtp.live.com', 
    'user' => 'brennoduarte2015@outlook.com', 
    'pass' => 'b3st1nth3w0rld@m1cr0s0ft',
    'port' => 587,
    'from_name' => 'Brenno Duarte',
    'from_email' => 'brennoduarte2015@outlook.com'
]);

# INFO DO SISTEMA

define('SYSTEM_INFO', [
    'version' => '2.5.1',
    'dateVersion' => '02/12/2019'
]);