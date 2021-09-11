<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\Component\ArticleApiComponent;
use App\Http\ArticleApiInterface;
use Cake\Event\EventManager;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\ArticlesController Test Case
 *
 * @uses \App\Controller\ArticlesController
 */
class ArticlesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * component() test case
     *
     * @return void
     */
    public function testComponent(): void
    {
        $id = '9565c6ad2ffc24c09364';
        $expected = 'CakePHP Tutorial';

        $componentInjection = function ($event) use ($id, $expected) {
            $subject = $this->createPartialMock(ArticleApiComponent::class, ['getTitleById']);
            $subject->expects($this->once())
                ->method('getTitleById')
                ->with($id)
                ->willReturn($expected);
            $event->getSubject()->ArticleApi = $subject;
        };
        EventManager::instance()->on('Controller.initialize', $componentInjection);

        $this->get('/articles/component');

        $actual = $this->viewVariable('title');
        $this->assertSame($expected, $actual, 'View variable is wrong.');
    }

    /**
     * di() test case
     *
     * @return void
     */
    public function testDi(): void
    {
        $this->mockService(ArticleApiInterface::class, function () {
            return new class implements ArticleApiInterface {
                public function getTitleById(string $id): string
                {
                    return 'CakePHP Tutorial';
                }
            };
        });

        $this->get('/articles/di');

        $actual = $this->viewVariable('title');
        $this->assertSame('CakePHP Tutorial', $actual, 'View variable is wrong.');
    }
}
