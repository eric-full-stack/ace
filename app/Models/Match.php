<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Match
 * @package App\Models
 * @version April 17, 2020, 3:54 am UTC
 *
 * @property \App\Models\AssociateSportsCourt associateSportsCourt
 * @property string type
 * @property integer associate_sports_court_id
 * @property integer ace
 * @property integer ace_type
 * @property string|\Carbon\Carbon schedule
 */
class Match extends Model
{
    use SoftDeletes;

    public $table = 'matches';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'type',
        'associate_sports_court_id',
        'ace',
        'ace_type',
        'schedule'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'string',
        'associate_sports_court_id' => 'integer',
        'created_by' => 'integer',
        'ace' => 'integer',
        'ace_type' => 'integer',
        'schedule' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type' => 'required',
        'associate_sports_court_id' => 'required',
        'ace' => 'required',
        'ace_type' => 'required',
        'schedule' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sport_court()
    {
        return $this->belongsTo(\App\Models\AssociateSportsCourt::class, 'associate_sports_court_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\morphTo
     **/
    public function ace()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\morphedByMany
     **/
    public function teams()
    {
        return $this->morphedByMany(\App\Models\Team::class, 'matchable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\morphedByMany
     **/
    public function players()
    {
        return $this->morphedByMany(\App\Models\Player::class, 'matchable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function created_by()
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }
}
