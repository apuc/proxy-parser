<?php


namespace workspace\controllers;


use core\App;
use core\Controller;
use core\Debug;
use core\ResponseType;
use workspace\models\Proxy;

class ProxyController extends Controller
{

    public function actionOne()
    {
        App::$responseType = ResponseType::APPLICATION_JSON;
        $proxy = Proxy::query();
        if(isset($_GET['type'])){
            $proxy->where('type', $_GET['type']);
        }
        $proxy = $proxy->inRandomOrder()->first();
        echo json_encode($proxy);
    }

}