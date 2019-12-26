<?php

$app->get('/' , function($request, $response){

    return $this->router->render($response, 'view-login/login.html');

})->setName('index');