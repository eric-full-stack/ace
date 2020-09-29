<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sport
 * @package App\Models
 * @version April 17, 2020, 3:51 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection teamSports
 * @property \Illuminate\Database\Eloquent\Collection playerSports
 * @property string name
 * @property string description
 * @property integer popularity
 */
class Sport extends Model
{
    use SoftDeletes;

    public $table = 'sports';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'popularity'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'popularity' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function teams()
    {
        return $this->belongsToMany(\App\Models\Team::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function players()
    {
        return $this->belongsToMany(\App\Models\Player::class)->withPivot('capitain')->withTimestamps();
    }
}
