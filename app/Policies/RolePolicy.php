<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RolePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any-roles');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Role $role): bool
    {

        return $user->can('view-role') && ($role->order > $user->roles()->pluck('order')->first());
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create-role');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Role $role): bool
    {
        return $user->can('update-role') && ($role->order > $user->roles()->pluck('order')->first());
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Role $role): bool
    {
        return $user->can('delete-role') && ($role->order > $user->roles()->pluck('order')->first());
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Role $role): bool
    {
        return $user->can('restore-role') && ($role->order > $user->roles()->pluck('order')->first());
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user): bool
    {
        return $user->can('force-delete-role');
    }

    public function deleteAny(User $user): bool
    {
        return $user->can('delete-any-role');
    }

    public function restoreAny(User $user): bool
    {
        return $user->can('restore-any-role');
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force-delete-any-role');
    }

    public function reorder(User $user): bool
    {
        return $user->can('reorder-role');
    }
}
