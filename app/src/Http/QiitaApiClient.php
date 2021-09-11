<?php
declare(strict_types=1);

namespace App\Http;

use Cake\Http\Client;
use Cake\Http\Exception\InternalErrorException;

class QiitaApiClient implements ArticleApiInterface
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
     * @return string article title
     */
    public function getTitleById(string $id): string
    {
        $response = $this->client->get("/api/v2/items/${id}");
        if (!$response->isOk()) {
            throw new InternalErrorException();
        }

        $article = json_decode((string)$response->getBody(), true);

        return $article['title'] ?? 'Unknown Title';
    }
}
