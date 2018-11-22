<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AcountsTypeApiTest extends TestCase
{
    use MakeAcountsTypeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAcountsType()
    {
        $acountsType = $this->fakeAcountsTypeData();
        $this->json('POST', '/api/v1/acountsTypes', $acountsType);

        $this->assertApiResponse($acountsType);
    }

    /**
     * @test
     */
    public function testReadAcountsType()
    {
        $acountsType = $this->makeAcountsType();
        $this->json('GET', '/api/v1/acountsTypes/'.$acountsType->id);

        $this->assertApiResponse($acountsType->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAcountsType()
    {
        $acountsType = $this->makeAcountsType();
        $editedAcountsType = $this->fakeAcountsTypeData();

        $this->json('PUT', '/api/v1/acountsTypes/'.$acountsType->id, $editedAcountsType);

        $this->assertApiResponse($editedAcountsType);
    }

    /**
     * @test
     */
    public function testDeleteAcountsType()
    {
        $acountsType = $this->makeAcountsType();
        $this->json('DELETE', '/api/v1/acountsTypes/'.$acountsType->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/acountsTypes/'.$acountsType->id);

        $this->assertResponseStatus(404);
    }
}
