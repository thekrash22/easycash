<?php

use Faker\Factory as Faker;
use App\Models\Transaction;
use App\Repositories\TransactionRepository;

trait MakeTransactionTrait
{
    /**
     * Create fake instance of Transaction and save it in database
     *
     * @param array $transactionFields
     * @return Transaction
     */
    public function makeTransaction($transactionFields = [])
    {
        /** @var TransactionRepository $transactionRepo */
        $transactionRepo = App::make(TransactionRepository::class);
        $theme = $this->fakeTransactionData($transactionFields);
        return $transactionRepo->create($theme);
    }

    /**
     * Get fake instance of Transaction
     *
     * @param array $transactionFields
     * @return Transaction
     */
    public function fakeTransaction($transactionFields = [])
    {
        return new Transaction($this->fakeTransactionData($transactionFields));
    }

    /**
     * Get fake data of Transaction
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTransactionData($transactionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'acounts_id' => $fake->randomDigitNotNull,
            'currency_histories_id' => $fake->randomDigitNotNull,
            'statuses_id' => $fake->randomDigitNotNull,
            'customervoucher' => $fake->word,
            'systemvoucher' => $fake->word,
            'amount' => $fake->word,
            'net' => $fake->word,
            'utility' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $transactionFields);
    }
}
