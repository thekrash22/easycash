<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TranferenciasApiTest extends TestCase
{
    use MakeTranferenciasTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTranferencias()
    {
        $tranferencias = $this->fakeTranferenciasData();
        $this->json('POST', '/api/v1/tranferencias', $tranferencias);

        $this->assertApiResponse($tranferencias);
    }

    /**
     * @test
     */
    public function testReadTranferencias()
    {
        $tranferencias = $this->makeTranferencias();
        $this->json('GET', '/api/v1/tranferencias/'.$tranferencias->id);

        $this->assertApiResponse($tranferencias->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTranferencias()
    {
        $tranferencias = $this->makeTranferencias();
        $editedTranferencias = $this->fakeTranferenciasData();

        $this->json('PUT', '/api/v1/tranferencias/'.$tranferencias->id, $editedTranferencias);

        $this->assertApiResponse($editedTranferencias);
    }

    /**
     * @test
     */
    public function testDeleteTranferencias()
    {
        $tranferencias = $this->makeTranferencias();
        $this->json('DELETE', '/api/v1/tranferencias/'.$tranferencias->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tranferencias/'.$tranferencias->id);

        $this->assertResponseStatus(404);
    }
}
