<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserObserver
{
    /**
     * Handle the app models user "creating" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function creating(User $user)
    {
        if (Hash::needsRehash($user->password)) {
            $user->password = Hash::make($user->password);
        }
    }

    /**
     * Handle the app models user "updating" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updating(User $user)
    {
        if (Hash::needsRehash($user->password)) {
            $user->password = Hash::make($user->password);
        }
    }

    /**
     * Handle the app models user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the app models user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the app models user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
