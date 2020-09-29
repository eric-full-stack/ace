<?php

namespace App\Policies;

use App\Models\AssociateGallery;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AssociateGalleryPolicy
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
        return $user->can('viewAny associate_galleries');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\AssociateGallery  $associateGallery
     * @return mixed
     */
    public function view(User $user, AssociateGallery $associateGallery)
    {
        return $user->can('view associate_gallery');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create associate_galleries');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\AssociateGallery  $associateGallery
     * @return mixed
     */
    public function update(User $user, AssociateGallery $associateGallery)
    {
        return $user->can('edit associate_galleries') && $user->associate->id === $associateGallery->associate->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\AssociateGallery  $associateGallery
     * @return mixed
     */
    public function delete(User $user, AssociateGallery $associateGallery)
    {
        return $user->can('delete associate_galleries') && $user->associate->id === $associateGallery->associate->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\AssociateGallery  $associateGallery
     * @return mixed
     */
    public function restore(User $user, AssociateGallery $associateGallery)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\AssociateGallery  $associateGallery
     * @return mixed
     */
    public function forceDelete(User $user, AssociateGallery $associateGallery)
    {
        //
    }
}
