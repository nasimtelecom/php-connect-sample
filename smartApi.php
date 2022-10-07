<?php

require("./vendor/autoload.php");

use NasimTelecom\Simotel\Simotel;
use App\Log;

$requestData = $_REQUEST;
$config = require("config.php");
$log = new Log;
try{
    $simotel = new Simotel($config);
    $res = $simotel->smartApi($requestData)->toJson();
    header('Content-Type: application/json; charset=utf-8');
    echo $res;
}
catch(Exception $ex){
    $errorMessage = $ex->getMessage();
    $log->error($errorMessage);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(["error"=>$errorMessage]);
}