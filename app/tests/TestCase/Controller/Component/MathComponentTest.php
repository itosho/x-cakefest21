<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\MathComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\MathComponent Test Case
 */
class MathComponentTest extends TestCase
{
    /** @var MathComponent */
    private MathComponent $mathComponent;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->mathComponent = new MathComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->mathComponent);
        parent::tearDown();
    }

    /**
     * doComplexOperation() test case
     *
     * @return void
     */
    public function testDoComplexOperation(): void
    {
        $amount1 = 100;
        $amount2 = 200;

        $actual = $this->mathComponent->doComplexOperation($amount1, $amount2);

        $this->assertSame($amount1 + $amount2, $actual, 'Total Amount is wrong');
    }
}
