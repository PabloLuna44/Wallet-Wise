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
        $title="Transations";
        $user = Auth::user();
        $accounts = $user->accounts()->with('transactions')->get();

        return view('transactions.index', compact('accounts','title'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Transations Create";
        $user = Auth::user();
        $accounts = $user->accounts;
        
       return view('transactions.create', compact('accounts','title'));

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


        Transaction::create($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        $title="Transations Show";
        return view('transactions.show', compact('transaction','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $title="Transations Edit";
        $accounts = Account::where('user_id', Auth::id())->get();
        return view('transactions.edit', compact('transaction','accounts','title'));
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
