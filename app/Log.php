<?php

namespace App;

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Log{

    private $logger;

    public function __construct()
    {
        $this->logger = new Logger('name');
        $this->logger->pushHandler(new StreamHandler('logs.log', Level::Debug));
    }

    public function info($label,$data=[]){
        $this->logger->info($label,$data);
    }

    public function error($label,$data=[]){
        $this->logger->error($label,$data);
    }
    
    public function warning($label,$data=[]){
        $this->logger->warning($label,$data);
    }

}