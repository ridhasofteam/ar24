<?php
namespace App\Service;
use GuzzleHttp\ClientInterface;
use App\Service\HttpClient;

class Ar24Client extends HttpClient
{
    public function __construct(ClientInterface $client)
    {
        parent::__construct($client);
    }

}
