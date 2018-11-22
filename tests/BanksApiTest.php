<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BanksApiTest extends TestCase
{
    use MakeBanksTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateBanks()
    {
        $banks = $this->fakeBanksData();
        $this->json('POST', '/api/v1/banks', $banks);

        $this->assertApiResponse($banks);
    }

    /**
     * @test
     */
    public function testReadBanks()
    {
        $banks = $this->makeBanks();
        $this->json('GET', '/api/v1/banks/'.$banks->id);

        $this->assertApiResponse($banks->toArray());
    }

    /**
     * @test
     */
    public function testUpdateBanks()
    {
        $banks = $this->makeBanks();
        $editedBanks = $this->fakeBanksData();

        $this->json('PUT', '/api/v1/banks/'.$banks->id, $editedBanks);

        $this->assertApiResponse($editedBanks);
    }

    /**
     * @test
     */
    public function testDeleteBanks()
    {
        $banks = $this->makeBanks();
        $this->json('DELETE', '/api/v1/banks/'.$banks->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/banks/'.$banks->id);

        $this->assertResponseStatus(404);
    }
}
