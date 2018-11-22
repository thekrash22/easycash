<?php

use App\Models\CurrencyHistory;
use App\Repositories\CurrencyHistoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CurrencyHistoryRepositoryTest extends TestCase
{
    use MakeCurrencyHistoryTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CurrencyHistoryRepository
     */
    protected $currencyHistoryRepo;

    public function setUp()
    {
        parent::setUp();
        $this->currencyHistoryRepo = App::make(CurrencyHistoryRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCurrencyHistory()
    {
        $currencyHistory = $this->fakeCurrencyHistoryData();
        $createdCurrencyHistory = $this->currencyHistoryRepo->create($currencyHistory);
        $createdCurrencyHistory = $createdCurrencyHistory->toArray();
        $this->assertArrayHasKey('id', $createdCurrencyHistory);
        $this->assertNotNull($createdCurrencyHistory['id'], 'Created CurrencyHistory must have id specified');
        $this->assertNotNull(CurrencyHistory::find($createdCurrencyHistory['id']), 'CurrencyHistory with given id must be in DB');
        $this->assertModelData($currencyHistory, $createdCurrencyHistory);
    }

    /**
     * @test read
     */
    public function testReadCurrencyHistory()
    {
        $currencyHistory = $this->makeCurrencyHistory();
        $dbCurrencyHistory = $this->currencyHistoryRepo->find($currencyHistory->id);
        $dbCurrencyHistory = $dbCurrencyHistory->toArray();
        $this->assertModelData($currencyHistory->toArray(), $dbCurrencyHistory);
    }

    /**
     * @test update
     */
    public function testUpdateCurrencyHistory()
    {
        $currencyHistory = $this->makeCurrencyHistory();
        $fakeCurrencyHistory = $this->fakeCurrencyHistoryData();
        $updatedCurrencyHistory = $this->currencyHistoryRepo->update($fakeCurrencyHistory, $currencyHistory->id);
        $this->assertModelData($fakeCurrencyHistory, $updatedCurrencyHistory->toArray());
        $dbCurrencyHistory = $this->currencyHistoryRepo->find($currencyHistory->id);
        $this->assertModelData($fakeCurrencyHistory, $dbCurrencyHistory->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCurrencyHistory()
    {
        $currencyHistory = $this->makeCurrencyHistory();
        $resp = $this->currencyHistoryRepo->delete($currencyHistory->id);
        $this->assertTrue($resp);
        $this->assertNull(CurrencyHistory::find($currencyHistory->id), 'CurrencyHistory should not exist in DB');
    }
}
