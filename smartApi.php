<?php

require("./vendor/autoload.php");

use NasimTelecom\Simotel\Simotel;
use App\Log;

try{
    $config = require("config.php");
    $simotel = new Simotel($config);
    $res = $simotel->smartApi($_REQUEST);
    echo $res;
}
catch(Exception $ex){
    die($ex->getMessage());
}