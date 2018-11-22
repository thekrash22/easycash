<?php

use App\Models\DocumentsType;
use App\Repositories\DocumentsTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DocumentsTypeRepositoryTest extends TestCase
{
    use MakeDocumentsTypeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DocumentsTypeRepository
     */
    protected $documentsTypeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->documentsTypeRepo = App::make(DocumentsTypeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDocumentsType()
    {
        $documentsType = $this->fakeDocumentsTypeData();
        $createdDocumentsType = $this->documentsTypeRepo->create($documentsType);
        $createdDocumentsType = $createdDocumentsType->toArray();
        $this->assertArrayHasKey('id', $createdDocumentsType);
        $this->assertNotNull($createdDocumentsType['id'], 'Created DocumentsType must have id specified');
        $this->assertNotNull(DocumentsType::find($createdDocumentsType['id']), 'DocumentsType with given id must be in DB');
        $this->assertModelData($documentsType, $createdDocumentsType);
    }

    /**
     * @test read
     */
    public function testReadDocumentsType()
    {
        $documentsType = $this->makeDocumentsType();
        $dbDocumentsType = $this->documentsTypeRepo->find($documentsType->id);
        $dbDocumentsType = $dbDocumentsType->toArray();
        $this->assertModelData($documentsType->toArray(), $dbDocumentsType);
    }

    /**
     * @test update
     */
    public function testUpdateDocumentsType()
    {
        $documentsType = $this->makeDocumentsType();
        $fakeDocumentsType = $this->fakeDocumentsTypeData();
        $updatedDocumentsType = $this->documentsTypeRepo->update($fakeDocumentsType, $documentsType->id);
        $this->assertModelData($fakeDocumentsType, $updatedDocumentsType->toArray());
        $dbDocumentsType = $this->documentsTypeRepo->find($documentsType->id);
        $this->assertModelData($fakeDocumentsType, $dbDocumentsType->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDocumentsType()
    {
        $documentsType = $this->makeDocumentsType();
        $resp = $this->documentsTypeRepo->delete($documentsType->id);
        $this->assertTrue($resp);
        $this->assertNull(DocumentsType::find($documentsType->id), 'DocumentsType should not exist in DB');
    }
}
