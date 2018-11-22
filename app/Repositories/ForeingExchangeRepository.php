<?php

namespace App\Repositories;

use App\Models\ForeingExchange;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ForeingExchangeRepository
 * @package App\Repositories
 * @version November 6, 2018, 4:57 am UTC
 *
 * @method ForeingExchange findWithoutFail($id, $columns = ['*'])
 * @method ForeingExchange find($id, $columns = ['*'])
 * @method ForeingExchange first($columns = ['*'])
*/
class ForeingExchangeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ForeingExchange::class;
    }
}
