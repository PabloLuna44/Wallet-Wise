<?php

namespace App\Http\Controllers;

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
        $user = Auth::user();
        $accounts = $user->accounts()->with('transactions')->get();

        return view('transactions.index', compact('accounts'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $accounts = $user->accounts;
        
        return view('transactions.create', compact('accounts'));
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
            'account_id' => 'required|exists:accounts,id',
        ]);

        // Obtain the account_id from the request
        $accountId = $request->input('account_id');

        // Create the transaction with the provided account_id
        Transaction::create([
            'amount' => $request->input('amount'),
            'transactionType' => $request->input('transactionType'),
            'dateTime' => $request->input('dateTime'),
            'account_id' => $accountId,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
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

        $transaction->update([
            'amount' => $request->input('amount'),
            'transactionType' => $request->input('transactionType'),
            'dateTime' => $request->input('dateTime'),
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
