<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider_id', 'oauth2_token', 'avatar', 'username', 'url', 'provider'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     **/
    public function addresses()
    {
        return $this->hasMany(\App\Models\Address::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     **/
    public function associate()
    {
        return $this->hasOne(\App\Models\Associate::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     **/
    public function player()
    {
        return $this->hasOne(\App\Models\Player::class);
    }



}
