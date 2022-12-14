<?php

namespace NasimTelecom\Simotel\SmartApi;

trait Commands
{
    private $apiCommands;

    private function addCommand($command)
    {
        $this->apiCommands[] = $command;
    }

    private function render()
    {
        $commands = implode(';', $this->apiCommands);
        $this->apiCommands = [];

        return $commands;
    }

    private function okResponse()
    {
        return ['ok' => 1,
            'commands' => $this->render(),];
    }

    private function errorResponse()
    {
        return ['ok' => 0];
    }

    /*
     *
     */
    private function cmdPlayAnnouncement($file)
    {
        $this->addCommand("PlayAnnouncement('$file')");
    }

    /*
     *
     */
    private function cmdPlayback($file)
    {
        $this->addCommand("Playback('$file')");
    }

    /*
     *
     */
    private function cmdSayDigit($number)
    {
        $this->addCommand("SayDigit($number)");
    }

    /*
     *
     */
    private function cmdSayNumber($number)
    {
        $this->addCommand("SayNumber($number)");
    }

    /*
    *
    */
    private function cmdSayDuration($duration)
    {
        $this->addCommand("SayDuration('$duration')");
    }

    /*
     *
     */
    private function cmdSayClock($clock)
    {
        $this->addCommand("SayClock($clock)");
    }

    /*
     *
     */
    private function cmdSayDate($date, $calender)
    {
        $this->addCommand("SayDate('$date','$calender')");
    }

    /*
     *
     */
    private function cmdGetData($file, $timeout, $digitsCount)
    {
        $this->addCommand("GetData('$file',$timeout,$digitsCount)");
    }

    /*
    *
    */
    private function cmdSetExten($exten, $clearUserData = true)
    {
        if ($clearUserData)
            $this->addCommand("ClearUserData()");
        
        $this->addCommand("SetExten('$exten')");
    }

    /*
    *
    */
    private function cmdClearUserData()
    {
        $this->addCommand("ClearUserData()");
    }

    /*
     * Set limit on call
     */
    private function cmdSetLimitOnCall($seconds)
    {
        $this->addCommand("SetLimitOnCall($seconds)");
    }

    /*
     *
     */
    private function MusicOnHold()
    {
        //
    }

    /*
     *
     */
    private function cmdExit($exit)
    {
        $this->addCommand("Exit('$exit')");
    }
}
