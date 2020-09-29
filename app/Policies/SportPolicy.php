<?php

namespace App\Policies;

use App\Models\Sport;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SportPolicy
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
        return $user->can('viewAny sports');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Sport  $sport
     * @return mixed
     */
    public function view(User $user, Sport $sport)
    {
        return $user->can('view sport');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create sports');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Sport  $sport
     * @return mixed
     */
    public function update(User $user, Sport $sport)
    {
        return $user->can('edit sports');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Sport  $sport
     * @return mixed
     */
    public function delete(User $user, Sport $sport)
    {
        return $user->can('delete sports');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Sport  $sport
     * @return mixed
     */
    public function restore(User $user, Sport $sport)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Sport  $sport
     * @return mixed
     */
    public function forceDelete(User $user, Sport $sport)
    {
        //
    }
}
