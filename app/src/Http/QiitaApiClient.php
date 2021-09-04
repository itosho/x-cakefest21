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
     * constructor
     */
    public function __construct()
    {
        $this->client = new Client([
            'host' => 'qiita.com',
            'scheme' => 'https',
        ]);
    }

    /**
     * Get items
     *
     * @return array response
     */
    public function items(): array
    {
        $response = $this->client->get('/api/v2/items');

        if (!$response->isOk()) {
            throw new InternalErrorException();
        }

        return json_decode((string)$response->getBody(), true);
    }
}
