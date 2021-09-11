<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\MathTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\MathTrait Test Case
 */
class MathTraitTest extends TestCase
{
    /**
     * doComplexOperation() test case
     *
     * @return void
     */
    public function testDoComplexOperation(): void
    {
        $subject = $this->getMockForTrait(MathTrait::class);
        $amount1 = 100;
        $amount2 = 200;

        $actual = $subject->doComplexOperation($amount1, $amount2);

        $this->assertSame($amount1 + $amount2, $actual, 'Total Amount is wrong');
    }
}
