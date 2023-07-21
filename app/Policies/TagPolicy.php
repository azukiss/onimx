<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class TagPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any-tags');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        return $user->can('view-tag');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create-tag');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return $user->can('update-tag');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return $user->can('delete-tag');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user): bool
    {
        return $user->can('restore-tag');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user): bool
    {
        return $user->can('force-delete-tag');
    }

    public function deleteAny(User $user): bool
    {
        return $user->can('delete-any-tag');
    }

    public function restoreAny(User $user): bool
    {
        return $user->can('restore-any-tag');
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force-delete-any-tag');
    }

    public function reorder(User $user): bool
    {
        return $user->can('reorder-tag');
    }
}
