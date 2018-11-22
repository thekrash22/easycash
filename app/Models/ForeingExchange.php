<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ForeingExchange
 * @package App\Models
 * @version November 6, 2018, 4:57 am UTC
 *
 * @property string name
 */
class ForeingExchange extends Model
{
    use SoftDeletes;

    public $table = 'foreing_exchanges';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
