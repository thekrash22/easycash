<?php

use Faker\Factory as Faker;
use App\Models\Countries;
use App\Repositories\CountriesRepository;

trait MakeCountriesTrait
{
    /**
     * Create fake instance of Countries and save it in database
     *
     * @param array $countriesFields
     * @return Countries
     */
    public function makeCountries($countriesFields = [])
    {
        /** @var CountriesRepository $countriesRepo */
        $countriesRepo = App::make(CountriesRepository::class);
        $theme = $this->fakeCountriesData($countriesFields);
        return $countriesRepo->create($theme);
    }

    /**
     * Get fake instance of Countries
     *
     * @param array $countriesFields
     * @return Countries
     */
    public function fakeCountries($countriesFields = [])
    {
        return new Countries($this->fakeCountriesData($countriesFields));
    }

    /**
     * Get fake data of Countries
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCountriesData($countriesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $countriesFields);
    }
}
