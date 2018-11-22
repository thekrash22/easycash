<?php

use App\Models\Banks;
use App\Repositories\BanksRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BanksRepositoryTest extends TestCase
{
    use MakeBanksTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var BanksRepository
     */
    protected $banksRepo;

    public function setUp()
    {
        parent::setUp();
        $this->banksRepo = App::make(BanksRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateBanks()
    {
        $banks = $this->fakeBanksData();
        $createdBanks = $this->banksRepo->create($banks);
        $createdBanks = $createdBanks->toArray();
        $this->assertArrayHasKey('id', $createdBanks);
        $this->assertNotNull($createdBanks['id'], 'Created Banks must have id specified');
        $this->assertNotNull(Banks::find($createdBanks['id']), 'Banks with given id must be in DB');
        $this->assertModelData($banks, $createdBanks);
    }

    /**
     * @test read
     */
    public function testReadBanks()
    {
        $banks = $this->makeBanks();
        $dbBanks = $this->banksRepo->find($banks->id);
        $dbBanks = $dbBanks->toArray();
        $this->assertModelData($banks->toArray(), $dbBanks);
    }

    /**
     * @test update
     */
    public function testUpdateBanks()
    {
        $banks = $this->makeBanks();
        $fakeBanks = $this->fakeBanksData();
        $updatedBanks = $this->banksRepo->update($fakeBanks, $banks->id);
        $this->assertModelData($fakeBanks, $updatedBanks->toArray());
        $dbBanks = $this->banksRepo->find($banks->id);
        $this->assertModelData($fakeBanks, $dbBanks->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteBanks()
    {
        $banks = $this->makeBanks();
        $resp = $this->banksRepo->delete($banks->id);
        $this->assertTrue($resp);
        $this->assertNull(Banks::find($banks->id), 'Banks should not exist in DB');
    }
}
