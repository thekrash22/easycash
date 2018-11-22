<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Divisas
 * @package App\Models
 * @version November 4, 2018, 1:44 am UTC
 *
 * @property string nombre
 * @property double valor
 */
class Divisas extends Model
{
    use SoftDeletes;

    public $table = 'divisas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'valor'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'valor' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
