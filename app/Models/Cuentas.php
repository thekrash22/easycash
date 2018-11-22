<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cuentas
 * @package App\Models
 * @version November 4, 2018, 1:20 am UTC
 *
 * @property string nombre_beneficiaro
 * @property integer tipo_documento
 * @property integer ndocumento
 * @property integer entidad_bancaria
 * @property integer tcuenta
 * @property string ncuenta
 */
class Cuentas extends Model
{
    use SoftDeletes;

    public $table = 'cuentas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre_beneficiaro',
        'tipo_documento',
        'ndocumento',
        'entidad_bancaria',
        'tcuenta',
        'ncuenta'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre_beneficiaro' => 'string',
        'tipo_documento' => 'integer',
        'ndocumento' => 'integer',
        'entidad_bancaria' => 'integer',
        'tcuenta' => 'integer',
        'ncuenta' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
