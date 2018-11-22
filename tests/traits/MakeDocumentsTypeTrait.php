<?php

use Faker\Factory as Faker;
use App\Models\DocumentsType;
use App\Repositories\DocumentsTypeRepository;

trait MakeDocumentsTypeTrait
{
    /**
     * Create fake instance of DocumentsType and save it in database
     *
     * @param array $documentsTypeFields
     * @return DocumentsType
     */
    public function makeDocumentsType($documentsTypeFields = [])
    {
        /** @var DocumentsTypeRepository $documentsTypeRepo */
        $documentsTypeRepo = App::make(DocumentsTypeRepository::class);
        $theme = $this->fakeDocumentsTypeData($documentsTypeFields);
        return $documentsTypeRepo->create($theme);
    }

    /**
     * Get fake instance of DocumentsType
     *
     * @param array $documentsTypeFields
     * @return DocumentsType
     */
    public function fakeDocumentsType($documentsTypeFields = [])
    {
        return new DocumentsType($this->fakeDocumentsTypeData($documentsTypeFields));
    }

    /**
     * Get fake data of DocumentsType
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDocumentsTypeData($documentsTypeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $documentsTypeFields);
    }
}
