<?php

use Faker\Factory as Faker;
use App\Models\Banks;
use App\Repositories\BanksRepository;

trait MakeBanksTrait
{
    /**
     * Create fake instance of Banks and save it in database
     *
     * @param array $banksFields
     * @return Banks
     */
    public function makeBanks($banksFields = [])
    {
        /** @var BanksRepository $banksRepo */
        $banksRepo = App::make(BanksRepository::class);
        $theme = $this->fakeBanksData($banksFields);
        return $banksRepo->create($theme);
    }

    /**
     * Get fake instance of Banks
     *
     * @param array $banksFields
     * @return Banks
     */
    public function fakeBanks($banksFields = [])
    {
        return new Banks($this->fakeBanksData($banksFields));
    }

    /**
     * Get fake data of Banks
     *
     * @param array $postFields
     * @return array
     */
    public function fakeBanksData($banksFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'countries_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $banksFields);
    }
}
