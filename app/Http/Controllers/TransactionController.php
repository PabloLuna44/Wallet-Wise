<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todas las cuentas del usuario autenticado
    $accounts = Account::where('user_id', Auth::id())->get();

    // Inicializar un array para almacenar todas las transacciones
    $transactions = [];

    // Recorrer cada cuenta y obtener las transacciones asociadas
    foreach ($accounts as $account) {
        // Obtener las transacciones para la cuenta actual
        $transactions1 = Transaction::where('accounts_id', $account->id)->get();

        // Agregar las transacciones al array general
        $transactions = array_merge($transactions, $transactions1->all());
    }

    // Pasar todas las transacciones a la vista
    return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $accounts = Account::where('user_id', Auth::id())->get();
        return view('transactions.create',compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'transactionType' => 'required|in:Depósito,Retiro,Transferencia,Pago',
            'dateTime' => 'required|date',
        ]);

        

        // $request->merge(['id_account' => ]);

        Transaction::create($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $accounts = Account::where('user_id', Auth::id())->get();
        return view('transactions.edit', compact('transaction','accounts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'transactionType' => 'required|in:Depósito,Retiro,Transferencia,Pago',
            'dateTime' => 'required|date',
        ]);

        $transaction->update($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transaction.index')->with('success', 'Transaction deleted successfuly.');
    }
}
