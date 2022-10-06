<?php

namespace NasimTelecom\Simotel;

use GuzzleHttp\Client;

class Simotel
{
    /**
     *
     * simotel config array
     *
     * @var array
     */
    private $config;

    /**
     * Simotel constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = empty($config) ? $this->loadDefaultConfig() : $config;
    }

    /**
     * @return SimotelApi
     */
    public function connect($address, $data = [], $httpClient = null)
    {
        $config = $this->config["simotelApi"] ?? [];
        $simotelApi = new SimotelApi($config);

        if($httpClient) 
            $simotelApi->setClient($httpClient);

        return $simotelApi->connect($address, $data);

    }

    /**
     * @param $data
     * @return bool|SmartApi
     */
    public function smartApi($data)
    {
        $smartApi = new SmartApi($this->config['smartApi'] ?? []);
        return $smartApi->call($data);
    }

    /**
     * @param $data
     * @return bool|IvrApi
     */
    public function ivrApiCall($data)
    {
        $ivrApi = new IvrApi($this->config['ivrApi'] ?? []);

        return $ivrApi->call($data);
    }
    /**
     * @param $data
     * @return bool|ExtensionApi
     */
    public function extensionApiCall($data)
    {
        $ivrApi = new ExtensionApi($this->config['extensionApi'] ?? []);
        return $ivrApi->call($data);
    }

    /**
     * @param $data
     * @return bool|TrunkApi
     */
    public function trunkApiCall($data)
    {
        $ivrApi = new TrunkApi($this->config['trunkApi'] ?? []);
        return $ivrApi->call($data);
    }

    /**
     * @return SimotelEventApi
     */
    public function eventApi()
    {
        return new SimotelEventApi();
    }

    /**
     * Retrieve default config.
     *
     * @return array
     */
    protected function loadDefaultConfig(): array
    {
        return require static::getDefaultConfigPath();
    }

    /**
     * Retrieve Default config's path.
     *
     * @return string
     */
    public static function getDefaultConfigPath(): string
    {
        return dirname(__DIR__) . '/config/simotel.php';
    }

    /**
     * @param array $config
     */
    public function setConfig(array $config)
    {
        $this->config = $config;
    }
}
