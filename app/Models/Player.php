<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Player
 * @package App\Models
 * @version April 17, 2020, 3:50 am UTC
 *
 * @property \App\Models\User user
 * @property \App\Models\Gender gender
 * @property \Illuminate\Database\Eloquent\Collection playerTeams
 * @property \Illuminate\Database\Eloquent\Collection playerSports
 * @property \Illuminate\Database\Eloquent\Collection transactions
 * @property string birth_date
 * @property string picture
 * @property integer gender_id
 * @property integer user_id
 * @property integer mmr
 * @property integer level
 * @property string latitute
 * @property string longitute
 */
class Player extends Model
{
    use SoftDeletes;

    public $table = 'players';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'birth_date',
        'picture',
        'gender_id',
        'user_id',
        'mmr',
        'level',
        'latitute',
        'longitute'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'birth_date' => 'string',
        'picture' => 'string',
        'gender_id' => 'integer',
        'user_id' => 'integer',
        'mmr' => 'integer',
        'level' => 'integer',
        'latitute' => 'string',
        'longitute' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'mmr' => 'required',
        'level' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function gender()
    {
        return $this->belongsTo(\App\Models\Gender::class, 'gender_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function teams()
    {
        return $this->belongsToMany(\App\Models\Team::class)->withPivot('capitain')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function sports()
    {
        return $this->belongsToMany(\App\Models\Sport::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function transactions()
    {
        return $this->hasMany(\App\Models\Transaction::class, 'player_id');
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
