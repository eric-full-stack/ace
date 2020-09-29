<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AssociateSportsCourt extends Pivot
{
    public $incrementing = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     **/
    public function prices()
    {
        return $this->hasMany(\App\Models\AssociateSportCourtPrice::class, 'associate_sports_court_id');
    }
}