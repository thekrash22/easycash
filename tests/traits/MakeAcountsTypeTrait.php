<?php

use Faker\Factory as Faker;
use App\Models\AcountsType;
use App\Repositories\AcountsTypeRepository;

trait MakeAcountsTypeTrait
{
    /**
     * Create fake instance of AcountsType and save it in database
     *
     * @param array $acountsTypeFields
     * @return AcountsType
     */
    public function makeAcountsType($acountsTypeFields = [])
    {
        /** @var AcountsTypeRepository $acountsTypeRepo */
        $acountsTypeRepo = App::make(AcountsTypeRepository::class);
        $theme = $this->fakeAcountsTypeData($acountsTypeFields);
        return $acountsTypeRepo->create($theme);
    }

    /**
     * Get fake instance of AcountsType
     *
     * @param array $acountsTypeFields
     * @return AcountsType
     */
    public function fakeAcountsType($acountsTypeFields = [])
    {
        return new AcountsType($this->fakeAcountsTypeData($acountsTypeFields));
    }

    /**
     * Get fake data of AcountsType
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAcountsTypeData($acountsTypeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $acountsTypeFields);
    }
}
