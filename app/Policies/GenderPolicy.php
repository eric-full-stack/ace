<?php

namespace App\Policies;

use App\Models\Gender;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GenderPolicy
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
        return $user->can('viewAny genders');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Gender  $gender
     * @return mixed
     */
    public function view(User $user, Gender $gender)
    {
        return $user->can('view gender');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create genders');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Gender  $gender
     * @return mixed
     */
    public function update(User $user, Gender $gender)
    {
        return $user->can('edit genders');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Gender  $gender
     * @return mixed
     */
    public function delete(User $user, Gender $gender)
    {
        return $user->can('delete genders');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Gender  $gender
     * @return mixed
     */
    public function restore(User $user, Gender $gender)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Gender  $gender
     * @return mixed
     */
    public function forceDelete(User $user, Gender $gender)
    {
        //
    }
}
