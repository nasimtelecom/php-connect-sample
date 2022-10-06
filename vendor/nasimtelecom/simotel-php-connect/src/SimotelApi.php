<?php

namespace NasimTelecom\Simotel;

use GuzzleHttp\Client;

class SimotelApi
{
    /**
     *
     * simotel api config
     *
     * @var array
     */
    private $config;

    /**
     *
     * http client
     *
     * @var Client
     */
    private $client;

    /**
     *
     * response
     *
     */
    private $response;

    /**
     * SimotelApi constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = $config;
        $this->client = new Client(["base_uri" => $config["server_address"] ?? ""]);
    }

    public function setClient(Client $client){
        $this->client = $client;
    }

    public function connect($action, $data)
    {
        $this->response = $this->client->request(
            "post",
            $action,
            $this->httpRequestOptions($data)
        );

        return $this;
    }

    public function __toString()
    {
        return (string) $this->response->getBody();
    }

    public function getMessage(){
        return $this->toArray()["message"] ?? "";
    }

    public function isSuccess(){
        return (bool) $this->toArray()["success"] ?? false; 
    }
    
    public function getData(){
        return $this->toArray()["data"] ?? [];
    }

    public function isOk(){
        return $this->response->getReasonPhrase() === "OK" ;
    }

    public function getStatusCode(){
        return $this->response->getStatusCode() ;
    }

    public function toArray(){
        return json_decode($this->response->getBody(),true);
    }


    /**
     * @return array
     */
    private function httpRequestOptions($data)
    {

        $apiAuth = $this->config["api_auth"] ?? "basic";
        $apiUser = $this->config["api_user"] ?? "";
        $apiPass = $this->config["api_pass"] ?? "";
        $apiKey  = $this->config["api_key"]  ?? "";

        $options = [
            "json"=>$data,
            "headers"=>[
                "Content-Type"=>"application/json"
            ],
        ];

        if(in_array($apiAuth,["basic","both"])){
            $options['auth'] = [$apiUser, $apiPass];
        }

        if(in_array($apiAuth,["token","both"])){
            $options['headers']['X-APIKEY'] = $apiKey;
        }

        return $options;
    }
}
