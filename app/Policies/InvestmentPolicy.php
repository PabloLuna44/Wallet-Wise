<?php

namespace App\Policies;

use App\Models\Investment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class InvestmentPolicy
{
    /**
     * Determine whether the user can view any investments.
     */
    public function viewAny(User $user): bool
    {
        // Permitir ver todas las inversiones solo si el usuario está autenticado
        return $user->id !== null;
    }

    /**
     * Determine whether the user can view the investment.
     */
    public function view(User $user, Investment $investment): bool
    {
        // Permitir ver la inversión solo si el usuario es propietario de ella
        return $user->id === $investment->user_id;
    }

    /**
     * Determine whether the user can create investments.
     */
    public function create(User $user): bool
    {
        // Permitir la creación de inversiones si el usuario está autenticado
        return $user->id !== null;
    }

    /**
     * Determine whether the user can update the investment.
     */
    public function update(User $user, Investment $investment): bool
    {
        // Permitir actualizar la inversión solo si el usuario es propietario de ella
        return $user->id === $investment->user_id;
    }

    /**
     * Determine whether the user can delete the investment.
     */
    public function delete(User $user, Investment $investment): bool
    {
        // Permitir eliminar la inversión solo si el usuario es propietario de ella
        return $user->id === $investment->user_id;
    }

    /**
     * Determine whether the user can restore the investment.
     */
    public function restore(User $user, Investment $investment): bool
    {
        // Permitir restaurar la inversión solo si el usuario es propietario de ella
        return $user->id === $investment->user_id;
    }

    /**
     * Determine whether the user can permanently delete the investment.
     */
    public function forceDelete(User $user, Investment $investment): bool
    {
        // Permitir eliminar permanentemente la inversión solo si el usuario es propietario de ella
        return $user->id === $investment->user_id;
    }
}
