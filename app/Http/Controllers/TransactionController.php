<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transactions.create');
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

        $transaction = new Transaction();
        $transaction->amount = $request->amount;
        $transaction->transactionType = $request->transactionType;
        $transaction->dateTime = $request->dateTime;



        $transaction->save();

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

        $transaction->amount = $request->amount;
        $transaction->transactionType = $request->transactionType;
        $transaction->dateTime = $request->dateTime; // Corrección aquí

        $transaction->save();

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
