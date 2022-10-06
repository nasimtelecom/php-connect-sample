<?php

namespace App\Simotel\SmartApi;

use \NasimTelecom\Simotel\SmartApi\Commands;

class SmartApiApp{
    
    use Commands;

    public function sayClock($data){
        $this->cmdSayDigit(123);
        return $this->okResponse();
    }
}