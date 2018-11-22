<?php

use App\Models\Acounts;
use App\Repositories\AcountsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AcountsRepositoryTest extends TestCase
{
    use MakeAcountsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AcountsRepository
     */
    protected $acountsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->acountsRepo = App::make(AcountsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAcounts()
    {
        $acounts = $this->fakeAcountsData();
        $createdAcounts = $this->acountsRepo->create($acounts);
        $createdAcounts = $createdAcounts->toArray();
        $this->assertArrayHasKey('id', $createdAcounts);
        $this->assertNotNull($createdAcounts['id'], 'Created Acounts must have id specified');
        $this->assertNotNull(Acounts::find($createdAcounts['id']), 'Acounts with given id must be in DB');
        $this->assertModelData($acounts, $createdAcounts);
    }

    /**
     * @test read
     */
    public function testReadAcounts()
    {
        $acounts = $this->makeAcounts();
        $dbAcounts = $this->acountsRepo->find($acounts->id);
        $dbAcounts = $dbAcounts->toArray();
        $this->assertModelData($acounts->toArray(), $dbAcounts);
    }

    /**
     * @test update
     */
    public function testUpdateAcounts()
    {
        $acounts = $this->makeAcounts();
        $fakeAcounts = $this->fakeAcountsData();
        $updatedAcounts = $this->acountsRepo->update($fakeAcounts, $acounts->id);
        $this->assertModelData($fakeAcounts, $updatedAcounts->toArray());
        $dbAcounts = $this->acountsRepo->find($acounts->id);
        $this->assertModelData($fakeAcounts, $dbAcounts->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAcounts()
    {
        $acounts = $this->makeAcounts();
        $resp = $this->acountsRepo->delete($acounts->id);
        $this->assertTrue($resp);
        $this->assertNull(Acounts::find($acounts->id), 'Acounts should not exist in DB');
    }
}
