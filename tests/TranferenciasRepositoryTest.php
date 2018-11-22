<?php

use App\Models\Tranferencias;
use App\Repositories\TranferenciasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TranferenciasRepositoryTest extends TestCase
{
    use MakeTranferenciasTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TranferenciasRepository
     */
    protected $tranferenciasRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tranferenciasRepo = App::make(TranferenciasRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTranferencias()
    {
        $tranferencias = $this->fakeTranferenciasData();
        $createdTranferencias = $this->tranferenciasRepo->create($tranferencias);
        $createdTranferencias = $createdTranferencias->toArray();
        $this->assertArrayHasKey('id', $createdTranferencias);
        $this->assertNotNull($createdTranferencias['id'], 'Created Tranferencias must have id specified');
        $this->assertNotNull(Tranferencias::find($createdTranferencias['id']), 'Tranferencias with given id must be in DB');
        $this->assertModelData($tranferencias, $createdTranferencias);
    }

    /**
     * @test read
     */
    public function testReadTranferencias()
    {
        $tranferencias = $this->makeTranferencias();
        $dbTranferencias = $this->tranferenciasRepo->find($tranferencias->id);
        $dbTranferencias = $dbTranferencias->toArray();
        $this->assertModelData($tranferencias->toArray(), $dbTranferencias);
    }

    /**
     * @test update
     */
    public function testUpdateTranferencias()
    {
        $tranferencias = $this->makeTranferencias();
        $fakeTranferencias = $this->fakeTranferenciasData();
        $updatedTranferencias = $this->tranferenciasRepo->update($fakeTranferencias, $tranferencias->id);
        $this->assertModelData($fakeTranferencias, $updatedTranferencias->toArray());
        $dbTranferencias = $this->tranferenciasRepo->find($tranferencias->id);
        $this->assertModelData($fakeTranferencias, $dbTranferencias->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTranferencias()
    {
        $tranferencias = $this->makeTranferencias();
        $resp = $this->tranferenciasRepo->delete($tranferencias->id);
        $this->assertTrue($resp);
        $this->assertNull(Tranferencias::find($tranferencias->id), 'Tranferencias should not exist in DB');
    }
}
