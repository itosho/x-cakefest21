<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\MathComponent;
use Cake\Controller\ComponentRegistry;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Http\Exception\BadRequestException;
use Cake\Http\ServerRequest;
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
        $request = new ServerRequest([
            'query' => ['amount1' => 100, 'amount2' => 200]
        ]);
        $controller = new Controller($request);
        $registry = new ComponentRegistry($controller);
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

    /**
     * beforeFilter() test case
     *
     * @doesNotPerformAssertions
     */
    public function testBeforeFilter(): void
    {
        $event = new Event('Controller.beforeFilter');
        $this->mathComponent->beforeFilter($event);
    }

    /**
     * beforeFilter() test case when bad request
     *
     * @return void
     */
    public function testBeforeFilterWhenBadRequest(): void
    {
        $this->expectException(BadRequestException::class);

        $request = new ServerRequest([
            'query' => ['amount1' => 100, 'amount3' => 200]
        ]);
        $controller = new Controller($request);
        $registry = new ComponentRegistry($controller);
        $component = new MathComponent($registry);
        $event = new Event('Controller.beforeFilter');

        $component->beforeFilter($event);
    }
}
