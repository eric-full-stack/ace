<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Team
 * @package App\Models
 * @version April 17, 2020, 3:51 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection playerTeams
 * @property \Illuminate\Database\Eloquent\Collection teamSports
 * @property string uuid
 * @property string name
 * @property string description
 * @property string picture
 * @property integer reputation
 * @property integer mmr
 */
class Team extends Model
{
    use SoftDeletes;

    public $table = 'teams';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'uuid',
        'name',
        'description',
        'picture',
        'reputation',
        'mmr'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uuid' => 'string',
        'name' => 'string',
        'description' => 'string',
        'picture' => 'string',
        'reputation' => 'integer',
        'mmr' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'uuid' => 'required',
        'name' => 'required',
        'reputation' => 'required',
        'mmr' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function players()
    {
        return $this->hasMany(\App\Models\Player::class, 'team_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function sports()
    {
        return $this->hasMany(\App\Models\Sport::class, 'team_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\morphMany
     **/
    public function aces()
    {
        return $this->morphMany(\App\Models\Match::class, 'ace');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\morphToMany
     **/
    public function matches()
    {
        return $this->morphToMany(\App\Models\Match::class, 'matchable');
    }
}
