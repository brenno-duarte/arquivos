<?php

echo '<pre>';

$data = $_POST;
$data['installmentQuantity'] = $data['itemQuantity1'];
$data['noInterestInstallmentQuantity'] = 12;
$data['installmentValue'] = $data['parcelValue'];

#var_dump($data);

#exit;
$url = "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions?email=brennoduarte2015@outlook.com&token=D7A8BD0D525742F885BA3EEB77ECFD04";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
$response = curl_exec($ch);
curl_close($curl);

$xml = simplexml_load_string($response);

var_dump($response);