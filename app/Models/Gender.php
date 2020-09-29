<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Gender
 * @package App\Models
 * @version April 17, 2020, 3:37 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection players
 * @property string name
 */
class Gender extends Model
{
    use SoftDeletes;

    public $table = 'genders';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


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
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function players()
    {
        return $this->hasMany(\App\Models\Player::class, 'gender_id');
    }
}
