<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Transaction
 * @package App\Models
 * @version November 6, 2018, 6:06 am UTC
 *
 * @property integer acounts_id
 * @property integer currency_histories_id
 * @property integer statuses_id
 * @property string customervoucher
 * @property string systemvoucher
 * @property string amount
 * @property string net
 * @property string utility
 */
class Transaction extends Model
{
    use SoftDeletes;

    public $table = 'transactions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'acounts_id',
        'currency_histories_id',
        'statuses_id',
        'customervoucher',
        'systemvoucher',
        'amount',
        'net',
        'utility'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'acounts_id' => 'integer',
        'currency_histories_id' => 'integer',
        'statuses_id' => 'integer',
        'customervoucher' => 'string',
        'systemvoucher' => 'string',
        'amount' => 'string',
        'net' => 'string',
        'utility' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
    
    public function acounts()
    {
        return $this->belongsTo(\App\Models\Acounts::class, 'acounts_id', 'id');
    }
    public function currencyHistories()
    {
        return $this->belongsTo(\App\Models\CurrencyHistory::class, 'currency_histories_id', 'id');
    }
    public function statuses()
    {
        return $this->belongsTo(\App\Models\Status::class, 'statuses_id', 'id');
    }
    public function assignments(){
        return $this->hasMany(\App\Models\Assignments::class, 'transaction_id', 'id');
    }
    
}
