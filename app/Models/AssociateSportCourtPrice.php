<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AssociateSportCourtPrice
 * @package App\Models
 * @version April 17, 2020, 3:55 am UTC
 *
 * @property \App\Models\AssociateSportsCourt associateSportsCourt
 * @property integer associate_sports_court_id
 * @property time hours
 * @property number amount
 */
class AssociateSportCourtPrice extends Model
{
    use SoftDeletes;

    public $table = 'associate_sports_court_prices';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'associate_sports_court_id',
        'hours',
        'amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'associate_sports_court_id' => 'integer',
        'amount' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'associate_sports_court_id' => 'required',
        'hours' => 'required',
        'amount' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sport_court()
    {
        return $this->belongsTo(\App\Models\AssociateSportsCourt::class, 'associate_sports_court_id');
    }
}
