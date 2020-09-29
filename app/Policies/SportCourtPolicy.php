<?php

namespace App\Policies;

use App\Models\SportCourt;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SportCourtPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('viewAny sport_courts');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\SportCourt  $sportCourt
     * @return mixed
     */
    public function view(User $user, SportCourt $sportCourt)
    {
        return $user->can('view sport_court');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create sport_courts');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\SportCourt  $sportCourt
     * @return mixed
     */
    public function update(User $user, SportCourt $sportCourt)
    {
        return $user->can('edit sport_courts');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\SportCourt  $sportCourt
     * @return mixed
     */
    public function delete(User $user, SportCourt $sportCourt)
    {
        return $user->can('delete sport_courts');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\SportCourt  $sportCourt
     * @return mixed
     */
    public function restore(User $user, SportCourt $sportCourt)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\SportCourt  $sportCourt
     * @return mixed
     */
    public function forceDelete(User $user, SportCourt $sportCourt)
    {
        //
    }
}
