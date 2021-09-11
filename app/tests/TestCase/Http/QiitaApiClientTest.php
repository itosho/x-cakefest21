<?php
declare(strict_types=1);

namespace App\Test\TestCase\Http;

use App\Http\QiitaApiClient;
use Cake\Http\Client;
use Cake\Http\Client\Response;
use Cake\TestSuite\TestCase;
use ReflectionException;
use ReflectionProperty;

/**
 * App\Http\QiitaApiClient Test Case
 */
class QiitaApiClientTest extends TestCase
{
    /** @var QiitaApiClient */
    private QiitaApiClient $client;

    /**
     * {@inheritDoc}
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->client = new QiitaApiClient();
    }

    /**
     * item() test case
     *
     * @return void
     * @throws ReflectionException
     */
    public function testItem(): void
    {
        $id = '9565c6ad2ffc24c09364';
        $title = 'CakePHP Tutorial';
        $response = ['title' => $title];

        $mock = $this->createPartialMock(Client::class, ['get']);
        $mock->expects($this->once())
            ->method('get')
            ->with("/api/v2/items/${id}")
            ->willReturn((new Response([], json_encode($response)))->withStatus(200));

        $property = new ReflectionProperty($this->client, 'client');
        $property->setAccessible(true);
        $property->setValue($this->client, $mock);

        $actual = $this->client->getTitleById($id);

        $this->assertSame($title, $actual, 'Response is wrong.');
    }
}
