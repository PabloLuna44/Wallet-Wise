<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Loan;
use Illuminate\Auth\Access\Response;

class LoanPolicy
{
    /**
     * Determine whether the user can view any loans.
     */
    public function viewAny(User $user): bool
    {
        // Permitir ver todos los préstamos solo si el usuario está autenticado
        return $user->id !== null;
    }

    /**
     * Determine whether the user can view the loan.
     */
    public function view(User $user, Loan $loan): bool
    {
        // Permitir ver el préstamo si el usuario es propietario de él o si está asociado al préstamo
        return $user->id === $loan->user_id || $user->loans->contains($loan);
    }

    /**
     * Determine whether the user can create loans.
     */
    public function create(User $user): bool
    {
        // Permitir la creación de préstamos si el usuario está autenticado
        return $user->id !== null;
    }

    /**
     * Determine whether the user can update the loan.
     */
    public function update(User $user, Loan $loan): bool
    {
        // Permitir actualizar el préstamo si el usuario es propietario de él o si está asociado al préstamo
        return $user->id === $loan->user_id || $loan->users->contains($user);
    }

    /**
     * Determine whether the user can delete the loan.
     */
    public function delete(User $user, Loan $loan): bool
    {
        // Permitir eliminar el préstamo si el usuario es propietario de él o si está asociado al préstamo
        return $user->id === $loan->user_id || $loan->users->contains($user);
    }


    /**
     * Determine whether the user can restore the loan.
     */
    public function restore(User $user, Loan $loan): bool
    {
        // Permitir restaurar el préstamo solo si el usuario es propietario de él
        return $user->id === $loan->user_id;
    }

    /**
     * Determine whether the user can permanently delete the loan.
     */
    public function forceDelete(User $user, Loan $loan): bool
    {
        // Permitir eliminar permanentemente el préstamo solo si el usuario es propietario de él
        return $user->id === $loan->user_id;
    }
}

