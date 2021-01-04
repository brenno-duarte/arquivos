<?php

use Solital\Core\Wolf\Wolf;
use Solital\Core\Http\Request;
use Solital\Core\Course\Course;
use Solital\Core\Http\Response;

Course::get('/', function(){
    Wolf::loadView('welcome');
});


Course::group(['prefix' => '/user', 'middleware' => '\Solital\Components\Controller\UserController'], function ()
{
    Course::match(['get', 'post'], '/login', 'UserController@user');
    Course::match(['get', 'post'], '/dashboard', 'UserController@dashboard');
});

# ou então

#Course::match(['get', 'post'], '/user/login', 'UserController@login')->addMiddleware('\Solital\Components\Controller\UserController:guest');

#Course::csrfVerifier(new \Solital\Core\Http\Middleware\BaseCsrfVerifier());

Course::group(['prefix' => '/admin'], function () {
    Course::get('/user', 'UserController@user')->name('user');
    Course::get('/func', 'UserController@func')->name('func');
});

Course::get('/container', 'UserController@container');
Course::get('/dashboard', 'UserController@dashboard');
Course::post('/upload', 'UserController@upload');

Course::post('/parametros', 'UserController@parametros')->name('parametros');

Course::get('/request', function (){
    echo '<pre>';
    var_dump(request()->getUri()->getPath());
});