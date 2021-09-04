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
     * @var QiitaApiClient|null
     */
    private ?QiitaApiClient $qiitaApiClient = null;

    /**
     * {@inheritDoc}
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->qiitaApiClient = new QiitaApiClient();
    }

    /**
     * Get Articles
     *
     * @return array
     */
    public function getArticles(): array
    {
        return $this->qiitaApiClient->items();
    }
}
