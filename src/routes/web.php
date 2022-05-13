<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/health', function () {
    return 'Hello World';
});


$router->get('/get-cart/{param}', 'CartController@get');
$router->post('/store-cart', 'CartController@store');
$router->delete('/delete-cart-one/{param}/{param2}', 'CartController@deleteOne');
$router->delete('/delete-cart-all/{param2}', 'CartController@deleteAll');

$router->get('/yandex/{totalSum}', 'YandexCart@yandex');

