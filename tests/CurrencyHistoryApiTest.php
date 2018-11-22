<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CurrencyHistoryApiTest extends TestCase
{
    use MakeCurrencyHistoryTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCurrencyHistory()
    {
        $currencyHistory = $this->fakeCurrencyHistoryData();
        $this->json('POST', '/api/v1/currencyHistories', $currencyHistory);

        $this->assertApiResponse($currencyHistory);
    }

    /**
     * @test
     */
    public function testReadCurrencyHistory()
    {
        $currencyHistory = $this->makeCurrencyHistory();
        $this->json('GET', '/api/v1/currencyHistories/'.$currencyHistory->id);

        $this->assertApiResponse($currencyHistory->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCurrencyHistory()
    {
        $currencyHistory = $this->makeCurrencyHistory();
        $editedCurrencyHistory = $this->fakeCurrencyHistoryData();

        $this->json('PUT', '/api/v1/currencyHistories/'.$currencyHistory->id, $editedCurrencyHistory);

        $this->assertApiResponse($editedCurrencyHistory);
    }

    /**
     * @test
     */
    public function testDeleteCurrencyHistory()
    {
        $currencyHistory = $this->makeCurrencyHistory();
        $this->json('DELETE', '/api/v1/currencyHistories/'.$currencyHistory->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/currencyHistories/'.$currencyHistory->id);

        $this->assertResponseStatus(404);
    }
}
