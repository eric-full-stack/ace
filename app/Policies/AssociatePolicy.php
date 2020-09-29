<?php

namespace App\Policies;

use App\Models\Associate;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AssociatePolicy
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
        return $user->can('viewAny associates');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Associate  $associate
     * @return mixed
     */
    public function view(User $user, Associate $associate)
    {
        return $user->can('view associate') && $associate->user_id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create associates');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Associate  $associate
     * @return mixed
     */
    public function update(User $user, Associate $associate)
    {
        return $user->can('edit associates') && $associate->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Associate  $associate
     * @return mixed
     */
    public function delete(User $user, Associate $associate)
    {
        return $user->can('delete associates') && $associate->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Associate  $associate
     * @return mixed
     */
    public function restore(User $user, Associate $associate)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Associate  $associate
     * @return mixed
     */
    public function forceDelete(User $user, Associate $associate)
    {
        //
    }
}
