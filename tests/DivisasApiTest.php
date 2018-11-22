<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DivisasApiTest extends TestCase
{
    use MakeDivisasTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDivisas()
    {
        $divisas = $this->fakeDivisasData();
        $this->json('POST', '/api/v1/divisas', $divisas);

        $this->assertApiResponse($divisas);
    }

    /**
     * @test
     */
    public function testReadDivisas()
    {
        $divisas = $this->makeDivisas();
        $this->json('GET', '/api/v1/divisas/'.$divisas->id);

        $this->assertApiResponse($divisas->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDivisas()
    {
        $divisas = $this->makeDivisas();
        $editedDivisas = $this->fakeDivisasData();

        $this->json('PUT', '/api/v1/divisas/'.$divisas->id, $editedDivisas);

        $this->assertApiResponse($editedDivisas);
    }

    /**
     * @test
     */
    public function testDeleteDivisas()
    {
        $divisas = $this->makeDivisas();
        $this->json('DELETE', '/api/v1/divisas/'.$divisas->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/divisas/'.$divisas->id);

        $this->assertResponseStatus(404);
    }
}
