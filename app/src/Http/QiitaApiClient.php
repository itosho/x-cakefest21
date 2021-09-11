<?php
declare(strict_types=1);

namespace App\Http;

use Cake\Http\Client;
use Cake\Http\Exception\InternalErrorException;

class QiitaApiClient
{
    /** @var Client */
    private Client $client;

    /**
     * constructor method
     */
    public function __construct()
    {
        $this->client = new Client(['host' => 'qiita.com', 'scheme' => 'https']);
    }

    /**
     * Get item by id
     *
     * @param string $id
     * @return array Qiita API response
     */
    public function item(string $id): array
    {
        $response = $this->client->get("/api/v2/items/${id}");

        if (!$response->isOk()) {
            throw new InternalErrorException();
        }

        return json_decode((string)$response->getBody(), true);
    }
}
