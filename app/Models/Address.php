<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Address
 * @package App\Models
 * @version April 17, 2020, 3:51 am UTC
 *
 * @property \App\Models\User user
 * @property string cep
 * @property string street
 * @property string district
 * @property string city
 * @property string state
 * @property integer number
 * @property string complement
 * @property integer user_id
 */
class Address extends Model
{
    use SoftDeletes;

    public $table = 'addresses';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'cep',
        'street',
        'district',
        'city',
        'state',
        'number',
        'complement',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cep' => 'string',
        'street' => 'string',
        'district' => 'string',
        'city' => 'string',
        'state' => 'string',
        'number' => 'integer',
        'complement' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cep' => 'required',
        'street' => 'required',
        'district' => 'required',
        'city' => 'required',
        'state' => 'required',
        'number' => 'required',
        'user_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
