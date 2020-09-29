<?php

namespace App\Policies;

use App\Models\Match;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MatchPolicy
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
        return $user->can('viewAny matches');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Match  $match
     * @return mixed
     */
    public function view(User $user, Match $match)
    {
        return $user->can('view match') && ($user->player->matches->contains($match->id) || $match->teams->players->contains($user->player->id));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create matches');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Match  $match
     * @return mixed
     */
    public function update(User $user, Match $match)
    {
        return $user->can('edit matches') && $match->created_by === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Match  $match
     * @return mixed
     */
    public function delete(User $user, Match $match)
    {
        return $user->can('edit matches') && $match->created_by === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Match  $match
     * @return mixed
     */
    public function restore(User $user, Match $match)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Match  $match
     * @return mixed
     */
    public function forceDelete(User $user, Match $match)
    {
        //
    }
}
