<?php

namespace App\Repositories;

use App\Models\Divisas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DivisasRepository
 * @package App\Repositories
 * @version November 4, 2018, 1:44 am UTC
 *
 * @method Divisas findWithoutFail($id, $columns = ['*'])
 * @method Divisas find($id, $columns = ['*'])
 * @method Divisas first($columns = ['*'])
*/
class DivisasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'valor'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Divisas::class;
    }
}
