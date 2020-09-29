<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Transaction
 * @package App\Models
 * @version April 17, 2020, 3:53 am UTC
 *
 * @property \App\Models\Player player
 * @property integer player_id
 * @property number amount
 * @property string type
 */
class Transaction extends Model
{
    use SoftDeletes;

    public $table = 'transactions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'player_id',
        'amount',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'player_id' => 'integer',
        'amount' => 'float',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'player_id' => 'required',
        'amount' => 'required',
        'type' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function player()
    {
        return $this->belongsTo(\App\Models\Player::class, 'player_id');
    }
}
