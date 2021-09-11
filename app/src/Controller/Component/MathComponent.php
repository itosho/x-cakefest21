<?php
declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;

/**
 * Math component
 */
class MathComponent extends Component
{
    /**
     * {@inheritDoc}
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);
    }

    /**
     * Do complex operation
     *
     * @param int $amount1
     * @param int $amount2
     * @return int total amount
     * @link https://book.cakephp.org/3/ja/controllers/components.html
     */
    public function doComplexOperation(int $amount1, int $amount2): int
    {
        return $amount1 + $amount2;
    }
}
