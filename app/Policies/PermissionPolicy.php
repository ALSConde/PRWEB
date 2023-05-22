<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Permissions;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        // for now, return true
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $Permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Permissions $Permission)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $Permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Permissions $Permissions)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permissions  $Permissions
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Permissions $Permissions)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permissions  $Permissions
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Permissions $Permissions)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permissions  $Permissions
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Permissions $Permissions)
    {
        //
    }
}
