<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\Component\ArticleApiComponent;
use App\Http\ArticleApiInterface;
use Exception;

/**
 * Articles Controller
 *
 * @property ArticleApiComponent $ArticleApi
 */
class ArticlesController extends AppController
{
    /**
     * {@inheritdoc}
     * @throws Exception
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('ArticleApi');
    }

    /**
     * Sample action by component
     *
     * @return void
     */
    public function component(): void
    {
        $id = '9565c6ad2ffc24c09364';
        $title = $this->ArticleApi->getTitleById($id);

        $this->set('title', $title);
    }

    /**
     * Sample action by DI container
     *
     * @param ArticleApiInterface $articleApi
     * @return void
     */
    public function di(ArticleApiInterface $articleApi): void
    {
        $id = '9565c6ad2ffc24c09364';
        $title = $articleApi->getTitleById($id);

        $this->set('title', $title);
    }
}
