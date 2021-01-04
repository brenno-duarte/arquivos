<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'callCurl/Source/callCurl.php';

$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJub21lIjoiYnJlbm5vIiwiZW1haWwiOiJicmVubm8uZ25yQGdtYWlsLmNvbSJ9.-qgDMGaP7Yw3Oh8OquEh1dfZ_Yil85OpPASVKjRoUrQ";

$array = [
    'nome' => 'solital framework',
    'idade' => '30'
];

$curl = new callCurl("http://localhost/API_TESTE/usuarios/26");
$res = $curl->put($array);

#echo '<pre>';

echo $res;