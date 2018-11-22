<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tranferencias
 * @package App\Models
 * @version November 4, 2018, 1:42 am UTC
 *
 * @property integer valor
 * @property string comprobante
 * @property integer beneficiario
 */
class Tranferencias extends Model
{
    use SoftDeletes;

    public $table = 'tranferencias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'valor',
        'comprobante',
        'beneficiario'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'valor' => 'integer',
        'comprobante' => 'string',
        'beneficiario' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
