<?php

use App\Models\ForeingExchange;
use App\Repositories\ForeingExchangeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ForeingExchangeRepositoryTest extends TestCase
{
    use MakeForeingExchangeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ForeingExchangeRepository
     */
    protected $foreingExchangeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->foreingExchangeRepo = App::make(ForeingExchangeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateForeingExchange()
    {
        $foreingExchange = $this->fakeForeingExchangeData();
        $createdForeingExchange = $this->foreingExchangeRepo->create($foreingExchange);
        $createdForeingExchange = $createdForeingExchange->toArray();
        $this->assertArrayHasKey('id', $createdForeingExchange);
        $this->assertNotNull($createdForeingExchange['id'], 'Created ForeingExchange must have id specified');
        $this->assertNotNull(ForeingExchange::find($createdForeingExchange['id']), 'ForeingExchange with given id must be in DB');
        $this->assertModelData($foreingExchange, $createdForeingExchange);
    }

    /**
     * @test read
     */
    public function testReadForeingExchange()
    {
        $foreingExchange = $this->makeForeingExchange();
        $dbForeingExchange = $this->foreingExchangeRepo->find($foreingExchange->id);
        $dbForeingExchange = $dbForeingExchange->toArray();
        $this->assertModelData($foreingExchange->toArray(), $dbForeingExchange);
    }

    /**
     * @test update
     */
    public function testUpdateForeingExchange()
    {
        $foreingExchange = $this->makeForeingExchange();
        $fakeForeingExchange = $this->fakeForeingExchangeData();
        $updatedForeingExchange = $this->foreingExchangeRepo->update($fakeForeingExchange, $foreingExchange->id);
        $this->assertModelData($fakeForeingExchange, $updatedForeingExchange->toArray());
        $dbForeingExchange = $this->foreingExchangeRepo->find($foreingExchange->id);
        $this->assertModelData($fakeForeingExchange, $dbForeingExchange->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteForeingExchange()
    {
        $foreingExchange = $this->makeForeingExchange();
        $resp = $this->foreingExchangeRepo->delete($foreingExchange->id);
        $this->assertTrue($resp);
        $this->assertNull(ForeingExchange::find($foreingExchange->id), 'ForeingExchange should not exist in DB');
    }
}
