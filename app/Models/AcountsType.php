<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AcountsType
 * @package App\Models
 * @version November 6, 2018, 5:14 am UTC
 *
 * @property string name
 */
class AcountsType extends Model
{
    use SoftDeletes;

    public $table = 'acounts_types';
    

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
