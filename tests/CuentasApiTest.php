<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CuentasApiTest extends TestCase
{
    use MakeCuentasTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCuentas()
    {
        $cuentas = $this->fakeCuentasData();
        $this->json('POST', '/api/v1/cuentas', $cuentas);

        $this->assertApiResponse($cuentas);
    }

    /**
     * @test
     */
    public function testReadCuentas()
    {
        $cuentas = $this->makeCuentas();
        $this->json('GET', '/api/v1/cuentas/'.$cuentas->id);

        $this->assertApiResponse($cuentas->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCuentas()
    {
        $cuentas = $this->makeCuentas();
        $editedCuentas = $this->fakeCuentasData();

        $this->json('PUT', '/api/v1/cuentas/'.$cuentas->id, $editedCuentas);

        $this->assertApiResponse($editedCuentas);
    }

    /**
     * @test
     */
    public function testDeleteCuentas()
    {
        $cuentas = $this->makeCuentas();
        $this->json('DELETE', '/api/v1/cuentas/'.$cuentas->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/cuentas/'.$cuentas->id);

        $this->assertResponseStatus(404);
    }
}
