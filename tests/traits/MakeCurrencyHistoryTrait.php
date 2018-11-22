<?php

use Faker\Factory as Faker;
use App\Models\CurrencyHistory;
use App\Repositories\CurrencyHistoryRepository;

trait MakeCurrencyHistoryTrait
{
    /**
     * Create fake instance of CurrencyHistory and save it in database
     *
     * @param array $currencyHistoryFields
     * @return CurrencyHistory
     */
    public function makeCurrencyHistory($currencyHistoryFields = [])
    {
        /** @var CurrencyHistoryRepository $currencyHistoryRepo */
        $currencyHistoryRepo = App::make(CurrencyHistoryRepository::class);
        $theme = $this->fakeCurrencyHistoryData($currencyHistoryFields);
        return $currencyHistoryRepo->create($theme);
    }

    /**
     * Get fake instance of CurrencyHistory
     *
     * @param array $currencyHistoryFields
     * @return CurrencyHistory
     */
    public function fakeCurrencyHistory($currencyHistoryFields = [])
    {
        return new CurrencyHistory($this->fakeCurrencyHistoryData($currencyHistoryFields));
    }

    /**
     * Get fake data of CurrencyHistory
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCurrencyHistoryData($currencyHistoryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'foreing_exchange_id' => $fake->randomDigitNotNull,
            'price' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $currencyHistoryFields);
    }
}
