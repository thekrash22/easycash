<?php

namespace App\Repositories;

use App\Models\Countries;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CountriesRepository
 * @package App\Repositories
 * @version November 6, 2018, 4:51 am UTC
 *
 * @method Countries findWithoutFail($id, $columns = ['*'])
 * @method Countries find($id, $columns = ['*'])
 * @method Countries first($columns = ['*'])
*/
class CountriesRepository extends BaseRepository
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
        return Countries::class;
    }
}
