<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DocumentsTypeApiTest extends TestCase
{
    use MakeDocumentsTypeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDocumentsType()
    {
        $documentsType = $this->fakeDocumentsTypeData();
        $this->json('POST', '/api/v1/documentsTypes', $documentsType);

        $this->assertApiResponse($documentsType);
    }

    /**
     * @test
     */
    public function testReadDocumentsType()
    {
        $documentsType = $this->makeDocumentsType();
        $this->json('GET', '/api/v1/documentsTypes/'.$documentsType->id);

        $this->assertApiResponse($documentsType->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDocumentsType()
    {
        $documentsType = $this->makeDocumentsType();
        $editedDocumentsType = $this->fakeDocumentsTypeData();

        $this->json('PUT', '/api/v1/documentsTypes/'.$documentsType->id, $editedDocumentsType);

        $this->assertApiResponse($editedDocumentsType);
    }

    /**
     * @test
     */
    public function testDeleteDocumentsType()
    {
        $documentsType = $this->makeDocumentsType();
        $this->json('DELETE', '/api/v1/documentsTypes/'.$documentsType->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/documentsTypes/'.$documentsType->id);

        $this->assertResponseStatus(404);
    }
}
