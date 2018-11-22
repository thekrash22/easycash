<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CurrencyHistory
 * @package App\Models
 * @version November 6, 2018, 5:36 am UTC
 *
 * @property integer foreing_exchange_id
 * @property double price
 */
class CurrencyHistory extends Model
{
    use SoftDeletes;

    public $table = 'currency_histories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'foreing_exchange_id',
        'price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'foreing_exchange_id' => 'integer',
        'price' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
    public function foreingexchange()
    {
        return $this->belongsTo(\App\Models\ForeingExchange::class, 'foreing_exchange_id', 'id');
    }

    //foreingExchange
}
