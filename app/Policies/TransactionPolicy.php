<?php

namespace App\Policies;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TransactionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // No permitir ver todas las transacciones
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Transaction $transaction): Response
    {
        // Permitir ver la transacción solo si el usuario es propietario de la cuenta asociada
        return $user->id === $transaction->account->user_id
            ? Response::allow()
            : Response::deny('No puedes ver transacciones de otras cuentas');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Permitir la creación de transacciones
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Transaction $transaction): Response
    {
        // Permitir actualizar la transacción solo si el usuario es propietario de la cuenta asociada
        return $user->id === $transaction->account->user_id
            ? Response::allow()
            : Response::deny('No puedes actualizar transacciones de otras cuentas');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Transaction $transaction): Response
    {
        // Permitir eliminar la transacción solo si el usuario es propietario de la cuenta asociada
        return $user->id === $transaction->account->user_id
            ? Response::allow()
            : Response::deny('No puedes eliminar transacciones de otras cuentas');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Transaction $transaction): bool
    {
        // Permitir eliminar la transacción solo si el usuario es propietario de la cuenta asociada
        return $user->id === $transaction->account->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Transaction $transaction): bool
    {
        // Permitir eliminar la transacción solo si el usuario es propietario de la cuenta asociada
        return $user->id === $transaction->account->user_id;
    }
}
