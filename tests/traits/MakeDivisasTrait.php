<?php

use Faker\Factory as Faker;
use App\Models\Divisas;
use App\Repositories\DivisasRepository;

trait MakeDivisasTrait
{
    /**
     * Create fake instance of Divisas and save it in database
     *
     * @param array $divisasFields
     * @return Divisas
     */
    public function makeDivisas($divisasFields = [])
    {
        /** @var DivisasRepository $divisasRepo */
        $divisasRepo = App::make(DivisasRepository::class);
        $theme = $this->fakeDivisasData($divisasFields);
        return $divisasRepo->create($theme);
    }

    /**
     * Get fake instance of Divisas
     *
     * @param array $divisasFields
     * @return Divisas
     */
    public function fakeDivisas($divisasFields = [])
    {
        return new Divisas($this->fakeDivisasData($divisasFields));
    }

    /**
     * Get fake data of Divisas
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDivisasData($divisasFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'valor' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $divisasFields);
    }
}
