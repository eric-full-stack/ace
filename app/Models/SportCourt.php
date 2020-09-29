<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SportCourt
 * @package App\Models
 * @version April 17, 2020, 3:53 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection associateSportsCourts
 * @property string name
 */
class SportCourt extends Model
{
    use SoftDeletes;

    public $table = 'sports_courts';
    
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
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function associates()
    {
        return $this->belongsToMany(\App\Models\Associate::class, 'sport_court_id')->using(\App\Models\AssociateSportsCourt::class)
                ->withPivot([
                    'professional',
                    'width',
                    'height',
                ]);
    }
}
