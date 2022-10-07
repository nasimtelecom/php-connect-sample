<?php

namespace App\Simotel\SmartApi;

use \NasimTelecom\Simotel\SmartApi\Commands;

class SayDateSmartApiApp{
    use Commands;

    public function sayDate($data){
        $this->cmdSayDate('1395-02-21', 'jalali');
        return $this->okResponse();
    }
    
}