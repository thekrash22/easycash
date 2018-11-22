<?php

use Faker\Factory as Faker;
use App\Models\Acounts;
use App\Repositories\AcountsRepository;

trait MakeAcountsTrait
{
    /**
     * Create fake instance of Acounts and save it in database
     *
     * @param array $acountsFields
     * @return Acounts
     */
    public function makeAcounts($acountsFields = [])
    {
        /** @var AcountsRepository $acountsRepo */
        $acountsRepo = App::make(AcountsRepository::class);
        $theme = $this->fakeAcountsData($acountsFields);
        return $acountsRepo->create($theme);
    }

    /**
     * Get fake instance of Acounts
     *
     * @param array $acountsFields
     * @return Acounts
     */
    public function fakeAcounts($acountsFields = [])
    {
        return new Acounts($this->fakeAcountsData($acountsFields));
    }

    /**
     * Get fake data of Acounts
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAcountsData($acountsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'beneficiary_name' => $fake->word,
            'documents_type_id' => $fake->randomDigitNotNull,
            'documentnumber' => $fake->word,
            'banks_id' => $fake->randomDigitNotNull,
            'acounts_types_id' => $fake->randomDigitNotNull,
            'acountnumber' => $fake->word,
            'users_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $acountsFields);
    }
}
