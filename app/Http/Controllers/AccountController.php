<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Accounts";
        $user = Auth::user();

        // Verificar si el usuario tiene permiso para ver cualquier cuenta
        if (Gate::allows('viewAny', Account::class)) {
            $accounts = $user->accounts;
            return view('accounts.index', compact('accounts', 'title'));
        } else {
            // Si el usuario no tiene permiso, mostrar un error 403 (Acceso prohibido)
            return abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Accounts Create";
        return view('accounts.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Verificar si el usuario tiene permiso para crear una cuenta
        $this->authorize('create', Account::class);

        $request->validate([
            'account_type' => 'required|max:50',
            'balance' => 'required|numeric',
        ]);

        $user = Auth::user();
        $user->accounts()->create($request->all());

        return redirect()->route('accounts.index')->with('success', 'Account created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        // Verificar si el usuario tiene permiso para ver la cuenta específica
        $this->authorize('view', $account);

        $title = "Accounts Show";
        $accountData = [
            'type' => 'accounts',
            'id' => $account->id,
            'Account Type' => $account->account_type,
            'Balance' => $account->balance,
        ];

        return view('accounts.show', compact('accountData', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        // Verificar si el usuario tiene permiso para editar la cuenta específica
        $this->authorize('update', $account);

        $title = "Accounts Edit";
        return view('accounts.edit', compact('account', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        // Verificar si el usuario tiene permiso para actualizar la cuenta específica
        $this->authorize('update', $account);

        $request->validate([
            'account_type' => 'required|max:50',
            'balance' => 'required|numeric',
        ]);

        $account->update($request->all());

        return redirect()->route('accounts.index')->with('success', 'Account updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        // Verificar si el usuario tiene permiso para eliminar la cuenta específica
        $this->authorize('delete', $account);

        $account->delete();

        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully.');
    }
}
