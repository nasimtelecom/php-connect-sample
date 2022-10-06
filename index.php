<?php

require("./vendor/autoload.php");

use App\Log;
use NasimSimotel\Simotel;

$log= new Log;

$config = require ("config.php");
$simotel = new Simotel($config);

try{
    $res = $simotel->connect("pbx/users/search",[
        "alike"=>false,
        "name"=>"all",
        "conditions"=>["name"=>"200"],
    ]);
    $log->info($res);
}
catch(Exception $ex){
    $log->error($ex->getMessage());
}