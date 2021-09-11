<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\ArticleApiComponent;
use App\Http\QiitaApiClient;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;
use ReflectionClass;

/**
 * App\Controller\Component\ArticleApiComponent Test Case
 */
class ArticleApiComponentTest extends TestCase
{
    /** @var ArticleApiComponent */
    private ArticleApiComponent $articleApiComponent;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->articleApiComponent = new ArticleApiComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->articleApiComponent);
        parent::tearDown();
    }

    /**
     * getTitleById() test case
     *
     * @return void
     */
    public function testGetTitleById(): void
    {
        $id = '9565c6ad2ffc24c09364';
        $title = 'CakePHP Tutorial';

        $reflection = new ReflectionClass($this->articleApiComponent);
        $property = $reflection->getProperty('qiitaApiClient');
        $property->setAccessible(true);
        $mock = $this->createPartialMock(QiitaApiClient::class, ['getTitleById']);
        $mock->expects($this->once())
            ->method('getTitleById')
            ->with($id)
            ->willReturn($title);

        $property->setValue($this->articleApiComponent, $mock);
        $actual = $this->articleApiComponent->getTitleById($id);

        $this->assertSame($title, $actual, 'Title is wrong');
    }
}
