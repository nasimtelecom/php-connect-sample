<?php

namespace NasimTelecom\Simotel;

use NasimTelecom\Simotel\SimotelEventApi\SimotelEvents;

class SimotelEventApi
{
    use SimotelEvents;

    /**
     * @param $simotelEventName
     * @param callable $callback
     */
    public function addListener($simotelEventName, callable $callback)
    {
        self::addEventListener($simotelEventName, $callback);
    }

    /**
     * @param $simotelEventName
     * @param $data
     * @throws \Exception
     */
    public function dispatch($simotelEventName, $data)
    {
        $events = [
            "Cdr", "NewState", "IncomingCall", "OutgoingCall", "Transfer", "ExtenAdded", "ExtenRemoved",
            "IncomingFax", "IncomingFax", "CdrQueue", "VoiceMail", "VoiceMailEmail", "Survey"
        ];

        if (!in_array($simotelEventName, $events))
            throw new \Exception("Unknown Event");

        self::dispatchEvent($simotelEventName, $data);
    }


    /**
     * @throws \Exception
     */
    public function resolve()
    {
        //find event name
        $simotelEventName = $_REQUEST["event_name"] ?? null;

        //dispatch event
        $this->dispatch($simotelEventName, $_REQUEST);

    }


}
