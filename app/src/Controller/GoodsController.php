<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\Component\MathComponent;
use Exception;

/**
 * Goods Controller
 *
 * @property MathComponent $Math
 * @uses MathComponent::beforeFilter()
 */
class GoodsController extends AppController
{
    use MathTrait;

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

    /**
     * Sample action by trait
     *
     * @return void
     */
    public function trait(): void
    {
        $amount1 = $this->request->getQuery('amount1');
        $amount2 = $this->request->getQuery('amount2');

        $amount1 = is_numeric($amount1) ? (int)$amount1 : 0;
        $amount2 = is_numeric($amount2) ? (int)$amount2 : 0;

        $amount = $this->doComplexOperation($amount1, $amount2);

        $this->set('amount', $amount);
    }
}
