<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Acounts
 * @package App\Models
 * @version November 6, 2018, 5:21 am UTC
 *
 * @property string beneficiary_name
 * @property integer documents_types_id
 * @property string documentnumber
 * @property integer banks_id
 * @property integer acounts_types_id
 * @property string acountnumber
 * @property integer users_id
 */
class Acounts extends Model
{
    use SoftDeletes;

    public $table = 'acounts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'beneficiary_name',
        'documents_types_id',
        'documentnumber',
        'banks_id',
        'acounts_types_id',
        'acountnumber',
        'users_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'beneficiary_name' => 'string',
        'documents_types_id' => 'integer',
        'documentnumber' => 'string',
        'banks_id' => 'integer',
        'acounts_types_id' => 'integer',
        'acountnumber' => 'string',
        'users_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
    
    public function documentsType()
    {
        return $this->belongsTo(\App\Models\DocumentsType::class, 'documents_types_id', 'id');
    }
    
    public function banks()
    {
        return $this->belongsTo(\App\Models\Banks::class, 'banks_id', 'id');
    }
    
    public function acountsTypes()
    {
        return $this->belongsTo(\App\Models\AcountsType::class, 'acounts_types_id', 'id');
    }
    
    public function users()
    {
        return $this->belongsTo(\App\User::class, 'users_id', 'id');
    }
    
    
}
