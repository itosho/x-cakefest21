<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Math Trait
 */
trait MathTrait
{
    /**
     * Do complex operation
     *
     * @param int $amount1
     * @param int $amount2
     * @return int total amount
     */
    public function doComplexOperation(int $amount1, int $amount2): int
    {
        return $amount1 + $amount2;
    }
}

