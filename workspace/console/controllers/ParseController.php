<?php


namespace workspace\console\controllers;


use core\console\ConsoleController;
use workspace\components\WebHtml;
use workspace\models\Proxy;

class ParseController extends ConsoleController
{

    public function actionRun()
    {
        $webHtml = new WebHtml();
        $this->out->r('start', 'green');
        $pageCount = 50;
        Proxy::truncate();
        for ($i = 1; $i <= $pageCount; $i++) {
            $res = $webHtml->getRequestArray(['perpage' => 100, 'p' => $i, 'api_key' => '64f779e78be24a94355746bd26c2fe0e']);
            if (!empty($res)) {
                foreach ((array)$res as $re) {
                    if (is_array($re)) {
                        Proxy::createByParse($re);
                    }
                }
            }
        }
        $this->out->r('emd', 'green');
    }

}