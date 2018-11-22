<?php

namespace App\Repositories;

use App\Models\AcountsType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AcountsTypeRepository
 * @package App\Repositories
 * @version November 6, 2018, 5:14 am UTC
 *
 * @method AcountsType findWithoutFail($id, $columns = ['*'])
 * @method AcountsType find($id, $columns = ['*'])
 * @method AcountsType first($columns = ['*'])
*/
class AcountsTypeRepository extends BaseRepository
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
        return AcountsType::class;
    }
}
