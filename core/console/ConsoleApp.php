<?php


namespace core\console;


use core\App;
use core\Database;
use Phroute\Phroute\Dispatcher;

class ConsoleApp extends App
{
    public $argv;

    public function run()
    {
        if(!$rout = $this->getRout()){
            echo "Not found \n";
            exit();
        }
        new Database();
        $dispatcher = new Dispatcher(App::$collector->getData());
        $response = $dispatcher->dispatch('GET', $rout);
        echo $response;
    }

    public function setArgv($argv)
    {
        $this->argv = $argv;
        return $this;
    }

    private function getRout()
    {
        if(isset($this->argv[1])){
            return $this->argv[1];
        }
        return null;
    }

    public static function start()
    {
        return new self();
    }


}