<?php

namespace App\Repositories;

use App\Models\Transaction;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TransactionRepository
 * @package App\Repositories
 * @version November 6, 2018, 6:06 am UTC
 *
 * @method Transaction findWithoutFail($id, $columns = ['*'])
 * @method Transaction find($id, $columns = ['*'])
 * @method Transaction first($columns = ['*'])
*/
class TransactionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'acounts_id',
        'currency_histories_id',
        'statuses_id',
        'customervoucher',
        'systemvoucher',
        'amount',
        'net',
        'utility'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Transaction::class;
    }
}
