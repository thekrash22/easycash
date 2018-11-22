<?php

namespace App\Repositories;

use App\Models\Tranferencias;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TranferenciasRepository
 * @package App\Repositories
 * @version November 4, 2018, 1:42 am UTC
 *
 * @method Tranferencias findWithoutFail($id, $columns = ['*'])
 * @method Tranferencias find($id, $columns = ['*'])
 * @method Tranferencias first($columns = ['*'])
*/
class TranferenciasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'valor',
        'comprobante',
        'beneficiario'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tranferencias::class;
    }
}
