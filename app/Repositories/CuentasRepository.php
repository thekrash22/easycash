<?php

namespace App\Repositories;

use App\Models\Cuentas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CuentasRepository
 * @package App\Repositories
 * @version November 4, 2018, 1:20 am UTC
 *
 * @method Cuentas findWithoutFail($id, $columns = ['*'])
 * @method Cuentas find($id, $columns = ['*'])
 * @method Cuentas first($columns = ['*'])
*/
class CuentasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre_beneficiaro',
        'tipo_documento',
        'ndocumento',
        'entidad_bancaria',
        'tcuenta',
        'ncuenta'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Cuentas::class;
    }
}
