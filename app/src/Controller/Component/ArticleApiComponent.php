<?php
declare(strict_types=1);

namespace App\Controller\Component;

use App\Http\QiitaApiClient;
use Cake\Controller\Component;

/**
 * ArticleApi component
 */
class ArticleApiComponent extends Component
{
    /**
     * @var QiitaApiClient
     */
    private QiitaApiClient $qiitaApiClient;

    /**
     * {@inheritDoc}
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->qiitaApiClient = new QiitaApiClient();
    }

    /**
     * Get article title by id
     *
     * @param  string id
     * @return string article title
     */
    public function getTitleById(string $id): string
    {
        $article = $this->qiitaApiClient->item($id);

        return $article['title'] ?? 'Unknown Title';
    }
}
