<?php

use core\App;

App::$collector->get('/', ['workspace\controllers\MainController', 'actionIndex']);
App::$collector->get('/users', ['workspace\controllers\MainController', 'actionUsers']);
App::$collector->get('/send-form', ['workspace\controllers\SendController', 'actionIndex']);
App::$collector->get('products', function(){
    return 'Create Product';
});
App::$collector->get('/items/{id}', ['workspace\controllers\MainController', 'actionItems']);
App::$collector->get('/user/{id}', ['workspace\controllers\MainController', 'actionUser']);
App::$collector->get('/forms/{id}', ['workspace\controllers\FormsController', 'actionShow']);

App::$collector->crud('/news', ['workspace\controllers\NewsController']);

App::$collector->get('/one-proxy', ['workspace\controllers\ProxyController', 'actionOne']);