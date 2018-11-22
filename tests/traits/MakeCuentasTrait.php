<?php

use Faker\Factory as Faker;
use App\Models\Cuentas;
use App\Repositories\CuentasRepository;

trait MakeCuentasTrait
{
    /**
     * Create fake instance of Cuentas and save it in database
     *
     * @param array $cuentasFields
     * @return Cuentas
     */
    public function makeCuentas($cuentasFields = [])
    {
        /** @var CuentasRepository $cuentasRepo */
        $cuentasRepo = App::make(CuentasRepository::class);
        $theme = $this->fakeCuentasData($cuentasFields);
        return $cuentasRepo->create($theme);
    }

    /**
     * Get fake instance of Cuentas
     *
     * @param array $cuentasFields
     * @return Cuentas
     */
    public function fakeCuentas($cuentasFields = [])
    {
        return new Cuentas($this->fakeCuentasData($cuentasFields));
    }

    /**
     * Get fake data of Cuentas
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCuentasData($cuentasFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre_beneficiaro' => $fake->word,
            'tipo_documento' => $fake->randomDigitNotNull,
            'ndocumento' => $fake->randomDigitNotNull,
            'entidad_bancaria' => $fake->randomDigitNotNull,
            'tcuenta' => $fake->randomDigitNotNull,
            'ncuenta' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $cuentasFields);
    }
}
