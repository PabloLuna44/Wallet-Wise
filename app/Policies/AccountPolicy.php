<?php

namespace App\Policies;

use App\Models\Account;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AccountPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // No permitir ver todas las cuentas
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Account $account): Response
    {
        // Permitir ver la cuenta solo si el usuario es propietario
        return $user->id === $account->user_id
            ? Response::allow()
            : Response::deny('No puedes ver cuentas de otros usuarios');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Permitir la creación de cuentas
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Account $account): Response
    {
        // Permitir actualizar la cuenta solo si el usuario es propietario
        return $user->id === $account->user_id
            ? Response::allow()
            : Response::deny('No puedes actualizar cuentas de otros usuarios');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Account $account): Response
    {
        // Permitir eliminar la cuenta solo si el usuario es propietario
        return $user->id === $account->user_id
            ? Response::allow()
            : Response::deny('No puedes eliminar cuentas de otros usuarios');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Account $account): bool
    {
        // Permitir restaurar la cuenta solo si el usuario es propietario
        return $user->id === $account->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Account $account): bool
    {
        // Permitir eliminar permanentemente la cuenta solo si el usuario es propietario
        return $user->id === $account->user_id;
    }
}
