<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Assignments
 * @package App\Models
 * @version November 21, 2018, 6:55 am UTC
 *
 * @property \App\Models\User user
 * @property \App\Models\Transaction transaction
 * @property integer users_id
 * @property integer transaction_id
 */
class Assignments extends Model
{
    use SoftDeletes;

    public $table = 'assignments';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'users_id',
        'transaction_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'users_id' => 'integer',
        'transaction_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'users_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function transaction()
    {
        return $this->belongsTo(\App\Models\Transaction::class, 'transaction_id', 'id');
    }
}
