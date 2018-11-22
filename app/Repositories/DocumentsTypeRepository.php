<?php

namespace App\Repositories;

use App\Models\DocumentsType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DocumentsTypeRepository
 * @package App\Repositories
 * @version November 6, 2018, 5:14 am UTC
 *
 * @method DocumentsType findWithoutFail($id, $columns = ['*'])
 * @method DocumentsType find($id, $columns = ['*'])
 * @method DocumentsType first($columns = ['*'])
*/
class DocumentsTypeRepository extends BaseRepository
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
        return DocumentsType::class;
    }
}
