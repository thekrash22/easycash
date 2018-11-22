<?php

use Faker\Factory as Faker;
use App\Models\ForeingExchange;
use App\Repositories\ForeingExchangeRepository;

trait MakeForeingExchangeTrait
{
    /**
     * Create fake instance of ForeingExchange and save it in database
     *
     * @param array $foreingExchangeFields
     * @return ForeingExchange
     */
    public function makeForeingExchange($foreingExchangeFields = [])
    {
        /** @var ForeingExchangeRepository $foreingExchangeRepo */
        $foreingExchangeRepo = App::make(ForeingExchangeRepository::class);
        $theme = $this->fakeForeingExchangeData($foreingExchangeFields);
        return $foreingExchangeRepo->create($theme);
    }

    /**
     * Get fake instance of ForeingExchange
     *
     * @param array $foreingExchangeFields
     * @return ForeingExchange
     */
    public function fakeForeingExchange($foreingExchangeFields = [])
    {
        return new ForeingExchange($this->fakeForeingExchangeData($foreingExchangeFields));
    }

    /**
     * Get fake data of ForeingExchange
     *
     * @param array $postFields
     * @return array
     */
    public function fakeForeingExchangeData($foreingExchangeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $foreingExchangeFields);
    }
}
