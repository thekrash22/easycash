<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Banks
 * @package App\Models
 * @version November 6, 2018, 5:13 am UTC
 *
 * @property string name
 * @property integer countries_id
 */
class Banks extends Model
{
    use SoftDeletes;

    public $table = 'banks';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'countries_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'countries_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
    
    public function countries()
    {
        return $this->belongsTo(\App\Models\Countries::class, 'countries_id', 'id');
    }

    
}
