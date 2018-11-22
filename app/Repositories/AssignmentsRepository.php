<?php

namespace App\Repositories;

use App\Models\Assignments;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AssignmentsRepository
 * @package App\Repositories
 * @version November 21, 2018, 6:55 am UTC
 *
 * @method Assignments findWithoutFail($id, $columns = ['*'])
 * @method Assignments find($id, $columns = ['*'])
 * @method Assignments first($columns = ['*'])
*/
class AssignmentsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'users_id',
        'transaction_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Assignments::class;
    }
}
