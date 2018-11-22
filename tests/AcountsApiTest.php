<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AcountsApiTest extends TestCase
{
    use MakeAcountsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAcounts()
    {
        $acounts = $this->fakeAcountsData();
        $this->json('POST', '/api/v1/acounts', $acounts);

        $this->assertApiResponse($acounts);
    }

    /**
     * @test
     */
    public function testReadAcounts()
    {
        $acounts = $this->makeAcounts();
        $this->json('GET', '/api/v1/acounts/'.$acounts->id);

        $this->assertApiResponse($acounts->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAcounts()
    {
        $acounts = $this->makeAcounts();
        $editedAcounts = $this->fakeAcountsData();

        $this->json('PUT', '/api/v1/acounts/'.$acounts->id, $editedAcounts);

        $this->assertApiResponse($editedAcounts);
    }

    /**
     * @test
     */
    public function testDeleteAcounts()
    {
        $acounts = $this->makeAcounts();
        $this->json('DELETE', '/api/v1/acounts/'.$acounts->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/acounts/'.$acounts->id);

        $this->assertResponseStatus(404);
    }
}
