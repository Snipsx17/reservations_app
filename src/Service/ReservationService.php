<?php
namespace App\Service;

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

        $csv = Reader::createFromString($data);
        $csv->setDelimiter(';');

        $headers = ['Localizador', 'Huésped', 'fecha_de_entrada', 'fecha_de_salida', 'Hotel', 'Precio', 'Posibles_acciones'];

        // merge headers and reservations data
        $records = [];
        foreach ($csv->getRecords() as $record) {
            $records[] = array_combine($headers, $record);
        }

        return $records;
    }
}
