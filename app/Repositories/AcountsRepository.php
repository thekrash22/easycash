<?php

namespace App\Repositories;

use App\Models\Acounts;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AcountsRepository
 * @package App\Repositories
 * @version November 6, 2018, 5:21 am UTC
 *
 * @method Acounts findWithoutFail($id, $columns = ['*'])
 * @method Acounts find($id, $columns = ['*'])
 * @method Acounts first($columns = ['*'])
*/
class AcountsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'beneficiary_name',
        'documents_types_id',
        'documentnumber',
        'banks_id',
        'acounts_types_id',
        'acountnumber',
        'users_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Acounts::class;
    }
}
