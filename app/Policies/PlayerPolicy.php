<?php

namespace App\Policies;

use App\Models\Player;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlayerPolicy
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
        return $user->can('viewAny players');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Player  $player
     * @return mixed
     */
    public function view(User $user, Player $player)
    {
        return $user->can('view player');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create players');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Player  $player
     * @return mixed
     */
    public function update(User $user, Player $player)
    {
        return $user->can('edit players') && $player->user->id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Player  $player
     * @return mixed
     */
    public function delete(User $user, Player $player)
    {
        return $user->can('delete players') && $player->user->id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Player  $player
     * @return mixed
     */
    public function restore(User $user, Player $player)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Player  $player
     * @return mixed
     */
    public function forceDelete(User $user, Player $player)
    {
        //
    }
}
