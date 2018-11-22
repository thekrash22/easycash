<?php

use App\Models\AcountsType;
use App\Repositories\AcountsTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AcountsTypeRepositoryTest extends TestCase
{
    use MakeAcountsTypeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AcountsTypeRepository
     */
    protected $acountsTypeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->acountsTypeRepo = App::make(AcountsTypeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAcountsType()
    {
        $acountsType = $this->fakeAcountsTypeData();
        $createdAcountsType = $this->acountsTypeRepo->create($acountsType);
        $createdAcountsType = $createdAcountsType->toArray();
        $this->assertArrayHasKey('id', $createdAcountsType);
        $this->assertNotNull($createdAcountsType['id'], 'Created AcountsType must have id specified');
        $this->assertNotNull(AcountsType::find($createdAcountsType['id']), 'AcountsType with given id must be in DB');
        $this->assertModelData($acountsType, $createdAcountsType);
    }

    /**
     * @test read
     */
    public function testReadAcountsType()
    {
        $acountsType = $this->makeAcountsType();
        $dbAcountsType = $this->acountsTypeRepo->find($acountsType->id);
        $dbAcountsType = $dbAcountsType->toArray();
        $this->assertModelData($acountsType->toArray(), $dbAcountsType);
    }

    /**
     * @test update
     */
    public function testUpdateAcountsType()
    {
        $acountsType = $this->makeAcountsType();
        $fakeAcountsType = $this->fakeAcountsTypeData();
        $updatedAcountsType = $this->acountsTypeRepo->update($fakeAcountsType, $acountsType->id);
        $this->assertModelData($fakeAcountsType, $updatedAcountsType->toArray());
        $dbAcountsType = $this->acountsTypeRepo->find($acountsType->id);
        $this->assertModelData($fakeAcountsType, $dbAcountsType->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAcountsType()
    {
        $acountsType = $this->makeAcountsType();
        $resp = $this->acountsTypeRepo->delete($acountsType->id);
        $this->assertTrue($resp);
        $this->assertNull(AcountsType::find($acountsType->id), 'AcountsType should not exist in DB');
    }
}
