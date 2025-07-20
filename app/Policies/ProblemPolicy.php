<?php

namespace App\Policies;

use App\Models\Problem;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProblemPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('problem_access');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Problem $problem): bool
    {
        return $user->hasPermission('problem_show');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('problem_create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Problem $problem): bool
    {
        return $user->hasRole('admin') || ($user->hasPermission('problem_update') && $problem->user_id === $user->id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Problem $problem): bool
    {
        return $user->hasRole('admin') || ($user->hasPermission('problem_delete') && $problem->user_id === $user->id);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Problem $problem): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Problem $problem): bool
    {
        return false;
    }
}
