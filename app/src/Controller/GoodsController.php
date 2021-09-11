<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\Component\MathComponent;
use Exception;

/**
 * Goods Controller
 *
 * @property MathComponent $Math
 */
class GoodsController extends AppController
{
    /**
     * {@inheritdoc}
     * @throws Exception
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Math');
    }

    /**
     * Sample action by component
     *
     * @return void
     */
    public function component(): void
    {
        $amount1 = $this->request->getQuery('amount1');
        $amount2 = $this->request->getQuery('amount2');

        $amount1 = is_numeric($amount1) ? (int)$amount1 : 0;
        $amount2 = is_numeric($amount2) ? (int)$amount2 : 0;

        $amount = $this->Math->doComplexOperation($amount1, $amount2);

        $this->set('amount', $amount);
    }
}
