<?php

namespace App\Policies;

use App\Models\Address;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AddressPolicy
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
        return $user->can('viewAny addresses');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Address  $address
     * @return mixed
     */
    public function view(User $user, Address $address)
    {
        return $user->can('view address') && $address->user_id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create addresses');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Address  $address
     * @return mixed
     */
    public function update(User $user, Address $address)
    {
        return $user->can('edit addresses') && $address->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Address  $address
     * @return mixed
     */
    public function delete(User $user, Address $address)
    {
        return $user->can('delete addresses') && $address->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Address  $address
     * @return mixed
     */
    public function restore(User $user, Address $address)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Address  $address
     * @return mixed
     */
    public function forceDelete(User $user, Address $address)
    {
        //
    }
}
