<?php

namespace App\Simotel;

use NasimTelecom\Simotel\SimotelSmartApi\SmartApiCommands;

class SmartApiApp{
    
    use SmartApiCommands;

    public function sayClock($data){
        $this->cmdSayDigit(123);
        return $this->okResponse();
    }
}