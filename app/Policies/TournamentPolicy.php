<?php

namespace App\Policies;

use App\Models\Tournament;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TournamentPolicy
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
        return $user->can('viewAny tournaments');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Tournament  $tournament
     * @return mixed
     */
    public function view(User $user, Tournament $tournament)
    {
        return $user->can('view tournament');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create tournaments');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Tournament  $tournament
     * @return mixed
     */
    public function update(User $user, Tournament $tournament)
    {
        return $user->can('edit tournaments');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Tournament  $tournament
     * @return mixed
     */
    public function delete(User $user, Tournament $tournament)
    {
        return $user->can('delete tournaments');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Tournament  $tournament
     * @return mixed
     */
    public function restore(User $user, Tournament $tournament)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Tournament  $tournament
     * @return mixed
     */
    public function forceDelete(User $user, Tournament $tournament)
    {
        //
    }
}
