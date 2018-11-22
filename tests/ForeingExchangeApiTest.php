<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ForeingExchangeApiTest extends TestCase
{
    use MakeForeingExchangeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateForeingExchange()
    {
        $foreingExchange = $this->fakeForeingExchangeData();
        $this->json('POST', '/api/v1/foreingExchanges', $foreingExchange);

        $this->assertApiResponse($foreingExchange);
    }

    /**
     * @test
     */
    public function testReadForeingExchange()
    {
        $foreingExchange = $this->makeForeingExchange();
        $this->json('GET', '/api/v1/foreingExchanges/'.$foreingExchange->id);

        $this->assertApiResponse($foreingExchange->toArray());
    }

    /**
     * @test
     */
    public function testUpdateForeingExchange()
    {
        $foreingExchange = $this->makeForeingExchange();
        $editedForeingExchange = $this->fakeForeingExchangeData();

        $this->json('PUT', '/api/v1/foreingExchanges/'.$foreingExchange->id, $editedForeingExchange);

        $this->assertApiResponse($editedForeingExchange);
    }

    /**
     * @test
     */
    public function testDeleteForeingExchange()
    {
        $foreingExchange = $this->makeForeingExchange();
        $this->json('DELETE', '/api/v1/foreingExchanges/'.$foreingExchange->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/foreingExchanges/'.$foreingExchange->id);

        $this->assertResponseStatus(404);
    }
}
