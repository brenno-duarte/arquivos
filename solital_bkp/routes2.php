<?php

use Solital\Auth\Auth;
use Solital\Core\Wolf\Wolf;
use Solital\Core\Course\Course;
use Solital\Core\Http\Client\Client;

Course::get('/', function(){
    Wolf::loadView('welcome');
});

Course::get('/factory', function(){
    $auth = new Auth();
    #$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJub21lIjoiYnJlbm5vIiwiZW1haWwiOiJicmVubm8uZ25yQGdtYWlsLmNvbSJ9.-qgDMGaP7Yw3Oh8OquEh1dfZ_Yil85OpPASVKjRoUrQ";
    #$auth->basic('brenno', '123', 'realm');
    #$auth->digest('brenno', '123', 'realm');
    #$auth->JWT();
    pre($_SERVER);
});