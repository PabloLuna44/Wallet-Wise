<?php

namespace App\Policies;

use App\Models\Earning;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EarningPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //  Permitir ver todas las ganancias solo si el usuario está autenticado
        return $user->id !== null;

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Earning $earning): bool
    {
        
        // Permitir ver la ganancia solo si el usuario es propietario de ella
        return $user->id === $earning->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Permitir la creación de ganancias si el usuario está autenticado
        return $user->id !== null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Earning $earning): bool
    {
        // Permitir actualizar la ganancia solo si el usuario es propietario de ella
        return $user->id === $earning->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Earning $earning): bool
    {
        // Permitir eliminar la ganancia solo si el usuario es propietario de ella
        return $user->id === $earning->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Earning $earning): bool
    {
        // Permitir restaurar la ganancia solo si el usuario es propietario de ella
        return $user->id === $earning->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Earning $earning): bool
    {
        // Permitir eliminar permanentemente la ganancia solo si el usuario es propietario de ella
        return $user->id === $earning->user_id;
    }
}
