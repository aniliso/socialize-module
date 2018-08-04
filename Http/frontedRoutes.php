<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix'=>'sosyal'], function (Router $router) {
    $router->get('index', [
        'uses' => 'PublicController@index',
        'as'   => 'socialize.index'
    ]);
});