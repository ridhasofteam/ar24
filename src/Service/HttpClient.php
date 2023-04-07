<?php
namespace App\Service;
use GuzzleHttp\ClientInterface;

class HttpClient
{
    /**
     * @var ClientInterface
     */
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }


    public function getClient(): ClientInterface
    {
        return $this->client;
    }
}
