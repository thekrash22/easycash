<?php

namespace App\Repositories;

use App\Models\Banks;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BanksRepository
 * @package App\Repositories
 * @version November 6, 2018, 5:13 am UTC
 *
 * @method Banks findWithoutFail($id, $columns = ['*'])
 * @method Banks find($id, $columns = ['*'])
 * @method Banks first($columns = ['*'])
*/
class BanksRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'countries_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Banks::class;
    }
}
