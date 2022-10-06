<?php

namespace App\Simotel\SmartApi;

use \NasimTelecom\Simotel\SmartApi\Commands;

class SayDateSmartApiApp{
    use Commands;

    public function sayDate($data){
        var_dump($data);
        return ["asd"];
    }

    public function sayHello($data){
        var_dump($data);
        return ["asd"];
    }
    
}