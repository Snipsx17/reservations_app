<?php
namespace App\service;

use Symfony\Component\HttpClient\HttpClient;
use League\Csv\Reader;

class ReservationService
{
    private $httpClient;
    private $csvUrl = 'https://tech-test.wamdev.net/';
    private $authUser = 'guest';
    private $authPassword = 'wamguest';

    public function __construct()
    {
        $this->httpClient = HttpClient::create();
    }

    public function getReservationsData(): array
    {
        $response = $this->httpClient->request('GET', $this->csvUrl, [
            'auth_basic' => [$this->authUser, $this->authPassword],
        ]);

        $data = $response->getContent();

        
    }
}
