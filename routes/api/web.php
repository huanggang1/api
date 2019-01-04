<?php

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

//登录注册
$router->group([
    'namespace' => 'api',
        ], function ($router) {
    //登录
    $router->post('user/login', [
        'as' => "user.login",
        'uses' => 'MemberController@login'
    ]);
    //注册
    $router->post('user/register', [
        'as' => "user.register",
        'uses' => 'MemberController@register'
    ]);
    $router->group(['middleware' => 'auth'], function ($router) {
        //列表展示
        $router->get('user/info', [
            'as' => "user.info",
            'uses' => 'MemberController@info'
        ]);
        $router->get('user/infos', [
            'as' => "user.infos",
            'middleware' => 'auth',
            'uses' => 'MemberController@info'
        ]);
    });
});

