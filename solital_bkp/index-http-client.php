<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'vendor/autoload.php';

use Solital\HttpClient;

$client = new HttpClient();
/*$client->headers([
    'Content-type' => 'application/pdf'
]);*/
#http://localhost/Clinicalsys/api/v1/pacientes
#$client->token("eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJsb2dpbkZ1bmMiOiJjbGluaWNhbHN5cyIsInBhc3N3b3JkRnVuYyI6IiQyeSQxMCR1T3FpRVY3QVdIcWM2M2V4SkZocUtPRHlLVE5JUXJMTFk0NWx5RFVac3dwVGlINE9VTTFcL3kifQ.GXsrLF5cuCuUU3u9gXnYsutfxKdl4jGfdTELM4mha7A");
#$client->enableSSL();
/*$res = $client->put("http://localhost/API_TESTE/usuarios/26", [
    'nome' => 'solital framework',
    'idade' => '30'
]);*/

$res = $client->get("viacep.com.br/ws/63504210/json/");

echo $res;