<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Address' => 'App\Policies\AddressPolicy',
        'App\Models\AssociateGallery' => 'App\Policies\AssociateGalleryPolicy',
        'App\Models\Associate' => 'App\Policies\AssociatePolicy',
        'App\Models\Gender' => 'App\Policies\GenderPolicy',
        'App\Models\Player' => 'App\Policies\PlayerPolicy',
        'App\Models\SportCourt' => 'App\Policies\SportCourtPolicy',
        'App\Models\Sport' => 'App\Policies\SportPolicy',
        'App\Models\Team' => 'App\Policies\TeamPolicy',
        'App\Models\Tournament' => 'App\Policies\TournamentPolicy',
        'App\Models\User' => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

         // Implicitly grant "Super Admin" role all permission checks using can()
        Gate::before(function ($user, $ability) {
            if ($user->hasRole('super-admin')) {
                return true;
            }
        });
    }
}
