<?php

namespace App\Simotel\SmartApi;

use \NasimTelecom\Simotel\SmartApi\Commands;

class SmartApiApp{
    
    use Commands;

    public function sayHello($data){
       $this->cmdPlayAnnouncement("hellow");
       return $this->okResponse();
    }
}