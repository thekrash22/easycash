<?php

use App\Models\Cuentas;
use App\Repositories\CuentasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CuentasRepositoryTest extends TestCase
{
    use MakeCuentasTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CuentasRepository
     */
    protected $cuentasRepo;

    public function setUp()
    {
        parent::setUp();
        $this->cuentasRepo = App::make(CuentasRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCuentas()
    {
        $cuentas = $this->fakeCuentasData();
        $createdCuentas = $this->cuentasRepo->create($cuentas);
        $createdCuentas = $createdCuentas->toArray();
        $this->assertArrayHasKey('id', $createdCuentas);
        $this->assertNotNull($createdCuentas['id'], 'Created Cuentas must have id specified');
        $this->assertNotNull(Cuentas::find($createdCuentas['id']), 'Cuentas with given id must be in DB');
        $this->assertModelData($cuentas, $createdCuentas);
    }

    /**
     * @test read
     */
    public function testReadCuentas()
    {
        $cuentas = $this->makeCuentas();
        $dbCuentas = $this->cuentasRepo->find($cuentas->id);
        $dbCuentas = $dbCuentas->toArray();
        $this->assertModelData($cuentas->toArray(), $dbCuentas);
    }

    /**
     * @test update
     */
    public function testUpdateCuentas()
    {
        $cuentas = $this->makeCuentas();
        $fakeCuentas = $this->fakeCuentasData();
        $updatedCuentas = $this->cuentasRepo->update($fakeCuentas, $cuentas->id);
        $this->assertModelData($fakeCuentas, $updatedCuentas->toArray());
        $dbCuentas = $this->cuentasRepo->find($cuentas->id);
        $this->assertModelData($fakeCuentas, $dbCuentas->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCuentas()
    {
        $cuentas = $this->makeCuentas();
        $resp = $this->cuentasRepo->delete($cuentas->id);
        $this->assertTrue($resp);
        $this->assertNull(Cuentas::find($cuentas->id), 'Cuentas should not exist in DB');
    }
}
