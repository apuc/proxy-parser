<?php


namespace workspace\components;


class WebHtml
{

    public $url = 'https://htmlweb.ru/json/proxy/get';
    public $params = '';

    public function request()
    {
        if ($curl = curl_init()) {
            curl_setopt($curl, CURLOPT_URL, $this->url . $this->params);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $out = curl_exec($curl);
            curl_close($curl);
            return $out;
        }
    }

    public function getRequest($data = [])
    {
        $this->createParams($data);
        //var_dump($this->url . $this->params);
        return $this->request();
    }

    public function getRequestArray($data = [])
    {
        return json_decode($this->getRequest($data), true);
    }

    private function createParams($data = [])
    {
        if ($data) {
            $this->params = '?' . http_build_query($data);
        }
    }

}