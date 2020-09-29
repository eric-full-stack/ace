<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Associate
 * @package App\Models
 * @version April 17, 2020, 3:52 am UTC
 *
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection associatesGalleries
 * @property \Illuminate\Database\Eloquent\Collection associateSportsCourts
 * @property integer reputation
 * @property string cnpj
 * @property string opening_time
 * @property string closing_time
 * @property string cpf
 * @property string rg
 * @property string emissor
 * @property string bank
 * @property string agency
 * @property string account
 * @property integer user_id
 */
class Associate extends Model
{
    use SoftDeletes;

    public $table = 'associates';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'reputation',
        'cnpj',
        'opening_time',
        'closing_time',
        'cpf',
        'rg',
        'emissor',
        'bank',
        'agency',
        'account',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'reputation' => 'integer',
        'cnpj' => 'string',
        'opening_time' => 'string',
        'closing_time' => 'string',
        'cpf' => 'string',
        'rg' => 'string',
        'emissor' => 'string',
        'bank' => 'string',
        'agency' => 'string',
        'account' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'reputation' => 'required',
        'cnpj' => 'required',
        'opening_time' => 'required',
        'closing_time' => 'required',
        'cpf' => 'required',
        'rg' => 'required',
        'emissor' => 'required',
        'bank' => 'required',
        'agency' => 'required',
        'account' => 'required',
        'user_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function gallery()
    {
        return $this->hasMany(\App\Models\AssociateGallery::class, 'associate_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function sport_courts()
    {
        return $this->belongsToMany(\App\Models\SportCourt::class)->using(\App\Models\AssociateSportsCourt::class)
                ->withPivot([
                    'professional',
                    'width',
                    'height',
                ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasManyThrough
     **/
    public function prices()
    {
        return $this->hasManyThrough(\App\Models\AssociateSportCourtPrice::class, \App\Models\AssociateSportsCourt::class);
    }
}
