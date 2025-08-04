<?php

namespace App\Policies;

use App\Models\PerfilUnidade;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PerfilUnidadePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PerfilUnidade $perfilUnidade): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PerfilUnidade $perfilUnidade): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PerfilUnidade $perfilUnidade): bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PerfilUnidade $perfilUnidade): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PerfilUnidade $perfilUnidade): bool
    {
        return true;
    }
}
