<?php

namespace NasimTelecom\Simotel\Tests;

use NasimTelecom\Simotel\Simotel;
use NasimTelecom\Simotel\SmartApi\Commands;

class SmartApiTest extends TestCase
{
    private $config = [
        'smartApi' => [
            'apps' => [
                'fooApp' => FooSmartApi::class,
                '*'      => RestOfApps::class,
            ],
        ],
    ];

    public function testResponse()
    {
        $appData = [
            'app_name' => 'fooApp',
            'data'     => 'foo',
        ];

        $simotel = new Simotel($this->config);
        $response = $simotel->smartApi($appData);

        $this->assertJson($response->toJson());

        $response = $response->toArray();
        $this->assertIsArray($response);
        $this->assertArrayHasKey('commands', $response);
        $this->assertArrayHasKey('ok', $response);
    }

    public function testNoOkResponse()
    {
        $appData = [
            'app_name' => 'barApp',
        ];

        $simotel = new Simotel($this->config);
        $response = $simotel->smartApi($appData)->toArray();
        $this->assertEquals(['ok' => 0], $response);
    }

    public function testPlayAnnouncementCommand()
    {
        $appData = [
            'app_name' => 'playAnnounceApp',
            'data'     => 'welcome',
        ];

        $simotel = new Simotel($this->config);
        $response = $simotel->smartApi($appData)->toArray();

        $this->assertEquals(['ok' => 1, 'commands' => "PlayAnnouncement('welcome')"], $response);
    }
}

class FooSmartApi
{
    use Commands;

    public function fooApp()
    {
        $this->cmdExit(1);

        return $this->okResponse();
    }
}

class RestOfApps
{
    use Commands;

    public function barApp()
    {
        return $this->errorResponse();
    }

    public function playAnnounceApp($appData)
    {
        $this->cmdPlayAnnouncement($appData['data']);

        return $this->okResponse();
    }
}
