<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AssociateGallery
 * @package App\Models
 * @version April 17, 2020, 3:52 am UTC
 *
 * @property \App\Models\Associate associate
 * @property integer associate_id
 * @property string picture
 */
class AssociateGallery extends Model
{
    use SoftDeletes;

    public $table = 'associates_gallery';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'associate_id',
        'picture'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'associate_id' => 'integer',
        'picture' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'associate_id' => 'required',
        'picture' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function associate()
    {
        return $this->belongsTo(\App\Models\Associate::class, 'associate_id');
    }
}
