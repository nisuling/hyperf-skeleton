<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controller\IndexController@index');

Router::get('/test', 'App\Controller\IndexController::test');
Router::get('/pool', 'App\Controller\IndexController::pool');
Router::get('/redis', 'App\Controller\IndexController::redis');


/**用户
 * -----------------------------
 * 1、首页
 * 2、注册
 * 3、登录
 * -----------------------------
 **/
Router::addGroup('/user/',function(){
    Router::get('index', 'App\Controller\UserController@index');
    Router::get('register', 'App\Controller\UserController::register');
    Router::get('login', 'App\Controller\UserController::login');
    Router::get('update', 'App\Controller\UserController::update');
});

//Router::get('/user/index', 'App\Controller\UserController::index');
////Router::get('/user/register', 'App\Controller\UserController::register');
////Router::get('/user/login', 'App\Controller\UserController::login');
//Router::get('/user/update', 'App\Controller\UserController@update');

/**
 * -----------------------------
 *
 * -----------------------------
 */
Router::addServer('ws', function () {
    Router::get('/', 'App\Controller\WebSocketController');
});

