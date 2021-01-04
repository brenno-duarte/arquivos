<?php

require 'vendor/autoload.php';

use Solital\HttpClient;

$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJsb2dpbkZ1bmMiOiJjbGluaWNhbHN5cyIsInBhc3N3b3JkRnVuYyI6IiQyeSQxMCR1T3FpRVY3QVdIcWM2M2V4SkZocUtPRHlLVE5JUXJMTFk0NWx5RFVac3dwVGlINE9VTTFcL3kifQ.GXsrLF5cuCuUU3u9gXnYsutfxKdl4jGfdTELM4mha7A";

echo '<pre>';
$client = new HttpClient(null, $token);
/*$client->headers([
    'Content-type' => 'application/pdf'
]);*/
#http://localhost/Clinicalsys/api/v1/pacientes
#
#$client->enableSSL();

$res = $client->request("GET", "http://localhost/Clinicalsys/api/v1/pacientes");
/*$res = $client->request("POST", "http://localhost/API_TESTE/usuarios", [
    'nome' => 'http client',
    'idade' => '20'
]);*/
/*$res = $client->request("PUT", "http://localhost/API_TESTE/usuarios/9", [
    'nome' => 'http client',
    'idade' => '20'
]);*/
#$res = $client->request("DELETE", "http://localhost/API_TESTE/usuarios/7");

#$res = $client->get("viacep.com.br/ws/63504210/json/");

echo $res;