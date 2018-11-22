<?php

namespace App\Repositories;

use App\Models\CurrencyHistory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CurrencyHistoryRepository
 * @package App\Repositories
 * @version November 6, 2018, 5:36 am UTC
 *
 * @method CurrencyHistory findWithoutFail($id, $columns = ['*'])
 * @method CurrencyHistory find($id, $columns = ['*'])
 * @method CurrencyHistory first($columns = ['*'])
*/
class CurrencyHistoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'foreing_exchange_id',
        'price'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CurrencyHistory::class;
    }
}
