<?php

require("./vendor/autoload.php");

use NasimTelecom\Simotel\Simotel;
use App\Log;


$simotel = new Simotel();

$simotel->eventApi()->addListener('Cdr', function ($data) {
    $log= new Log;
    $log->info("cdrEvent",$data);
});
$simotel->eventApi()->addListener('NewState', function ($data) {
    $log= new Log;
    $log->info("NewState",$data);
});

$simotel->eventApi()->dispatch($_REQUEST["event_name"], $_REQUEST);