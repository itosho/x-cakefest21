<?php
declare(strict_types=1);

namespace App\Test\TestCase\Http;

use App\Http\QiitaApiClient;
use Cake\Http\Client;
use Cake\Http\Client\Response;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use ReflectionException;
use ReflectionProperty;

/**
 * App\Http\QiitaApiClientTest Test Case
 *
 * @uses \App\Http\QiitaApiClient
 */
class QiitaApiClientTest extends TestCase
{
    use IntegrationTestTrait;

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
        $response = ['title' => 'CakePHP Tutorial'];

        $clientMock = $this->createPartialMock(Client::class, ['get']);
        $clientMock
            ->expects($this->once())
            ->method('get')
            ->with("/api/v2/items/${id}")
            ->willReturn((new Response([], json_encode($response)))->withStatus(200));

        $clientProp = new ReflectionProperty($this->client, 'client');
        $clientProp->setAccessible(true);
        $clientProp->setValue($this->client, $clientMock);

        $this->assertSame($response, $this->client->item($id), 'Response is wrong.');
    }
}
