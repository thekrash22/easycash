<?php

use Faker\Factory as Faker;
use App\Models\Tranferencias;
use App\Repositories\TranferenciasRepository;

trait MakeTranferenciasTrait
{
    /**
     * Create fake instance of Tranferencias and save it in database
     *
     * @param array $tranferenciasFields
     * @return Tranferencias
     */
    public function makeTranferencias($tranferenciasFields = [])
    {
        /** @var TranferenciasRepository $tranferenciasRepo */
        $tranferenciasRepo = App::make(TranferenciasRepository::class);
        $theme = $this->fakeTranferenciasData($tranferenciasFields);
        return $tranferenciasRepo->create($theme);
    }

    /**
     * Get fake instance of Tranferencias
     *
     * @param array $tranferenciasFields
     * @return Tranferencias
     */
    public function fakeTranferencias($tranferenciasFields = [])
    {
        return new Tranferencias($this->fakeTranferenciasData($tranferenciasFields));
    }

    /**
     * Get fake data of Tranferencias
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTranferenciasData($tranferenciasFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'valor' => $fake->randomDigitNotNull,
            'comprobante' => $fake->word,
            'beneficiario' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $tranferenciasFields);
    }
}
