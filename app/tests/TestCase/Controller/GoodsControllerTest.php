<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\ArticlesController Test Case
 *
 * @uses \App\Controller\GoodsController
 */
class GoodsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * component() test case
     *
     * @return void
     */
    public function testComponent(): void
    {
        $amount1 = 100;
        $amount2 = 200;
        $this->get("/goods/component?amount1=${amount1}&amount2=${amount2}");

        $actual = $this->viewVariable('amount');
        $this->assertSame($amount1 + $amount2, $actual, 'View variable is wrong.');
    }

    /**
     * trait() test case
     *
     * @return void
     */
    public function testTrait(): void
    {
        $amount1 = 100;
        $amount2 = 200;
        $this->get("/goods/component?amount1=${amount1}&amount2=${amount2}");

        $actual = $this->viewVariable('amount');
        $this->assertSame($amount1 + $amount2, $actual, 'View variable is wrong.');
    }
}
