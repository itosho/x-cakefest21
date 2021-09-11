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
 * App\Http\QiitaApiClientTest Test Case
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

        $clientMock = $this->createPartialMock(Client::class, ['get']);
        $clientMock
            ->expects($this->once())
            ->method('get')
            ->with("/api/v2/items/${id}")
            ->willReturn((new Response([], json_encode($response)))->withStatus(200));

        $clientProp = new ReflectionProperty($this->client, 'client');
        $clientProp->setAccessible(true);
        $clientProp->setValue($this->client, $clientMock);

        $this->assertSame($title, $this->client->getTitleById($id), 'Response is wrong.');
    }
}
