<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\Component\ArticleApiComponent;
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
     * Index method
     *
     * @return void
     */
    public function index(): void
    {
        $articles = $this->ArticleApi->getArticles();
        $this->set('articles', $articles);
    }
}
