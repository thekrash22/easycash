<?php

use App\Models\Divisas;
use App\Repositories\DivisasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DivisasRepositoryTest extends TestCase
{
    use MakeDivisasTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DivisasRepository
     */
    protected $divisasRepo;

    public function setUp()
    {
        parent::setUp();
        $this->divisasRepo = App::make(DivisasRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDivisas()
    {
        $divisas = $this->fakeDivisasData();
        $createdDivisas = $this->divisasRepo->create($divisas);
        $createdDivisas = $createdDivisas->toArray();
        $this->assertArrayHasKey('id', $createdDivisas);
        $this->assertNotNull($createdDivisas['id'], 'Created Divisas must have id specified');
        $this->assertNotNull(Divisas::find($createdDivisas['id']), 'Divisas with given id must be in DB');
        $this->assertModelData($divisas, $createdDivisas);
    }

    /**
     * @test read
     */
    public function testReadDivisas()
    {
        $divisas = $this->makeDivisas();
        $dbDivisas = $this->divisasRepo->find($divisas->id);
        $dbDivisas = $dbDivisas->toArray();
        $this->assertModelData($divisas->toArray(), $dbDivisas);
    }

    /**
     * @test update
     */
    public function testUpdateDivisas()
    {
        $divisas = $this->makeDivisas();
        $fakeDivisas = $this->fakeDivisasData();
        $updatedDivisas = $this->divisasRepo->update($fakeDivisas, $divisas->id);
        $this->assertModelData($fakeDivisas, $updatedDivisas->toArray());
        $dbDivisas = $this->divisasRepo->find($divisas->id);
        $this->assertModelData($fakeDivisas, $dbDivisas->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDivisas()
    {
        $divisas = $this->makeDivisas();
        $resp = $this->divisasRepo->delete($divisas->id);
        $this->assertTrue($resp);
        $this->assertNull(Divisas::find($divisas->id), 'Divisas should not exist in DB');
    }
}
