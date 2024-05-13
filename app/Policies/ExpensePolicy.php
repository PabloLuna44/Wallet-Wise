<?php

namespace App\Policies;

use App\Models\Expense;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ExpensePolicy
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
    public function view(User $user, Expense $expense): bool
    {
        // Permitir ver la ganancia solo si el usuario es propietario de ella
        return $user->id === $expense->user_id;

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
    public function update(User $user, Expense $expense): bool
    {
        //  Permitir actualizar la ganancia solo si el usuario es propietario de ella
        return $user->id === $expense->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Expense $expense): bool
    {
        // Permitir eliminar la ganancia solo si el usuario es propietario de ella
        return $user->id === $expense->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Expense $expense): bool
    {
        // Permitir restaurar la ganancia solo si el usuario es propietario de ella
        return $user->id === $expense->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Expense $expense): bool
    {
        // Permitir eliminar la ganancia solo si el usuario es propietario de ella
        return $user->id === $expense->user_id;
    }
}
