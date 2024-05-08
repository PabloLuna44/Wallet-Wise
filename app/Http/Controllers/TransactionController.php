<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Transactions";
        $user = Auth::user();
        $accounts = $user->accounts()->with('transactions')->get();

        return view('transactions.index', compact('accounts','title'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

     
        $title="Transactions Create";
        $user = Auth::user();
        $accounts = $user->accounts;
        
        
       return view('transactions.create', compact('accounts','title'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $userEmail= Auth::user()->email;
        Mail::to($userEmail)->send(new TestMail());
        $account = Account::with('transactions')->find($request->account_id);
        $request->validate([
            'amount' => 'max:'.$account->balance.'|numeric|required',
            'transactionType' => 'required|in:Depósito,Retiro,Transferencia,Pago',
            'dateTime' => 'required|date',
            'account_id' => 'required|exists:accounts,id',
        ],
        [
            'amount.max' => 'The amount cannot be greater than the account balance..'
        ]);


    

        Transaction::create($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        $title="Transactions Show";
        
        $account = Account::with('transactions')->find($transaction->account_id);
        
        $transactionData = [
            'id' => $transaction->id,
            'Amount' => $transaction->amount,
            'Transaction Type' => $transaction->transactionType,
            'Date Time' => $transaction->dateTime,
            'Account' =>$account->accountType
        ];
    
        
        return view('transactions.show', compact('transactionData','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $title="Transactions Edit";
        $accounts = Account::where('user_id', Auth::id())->get();
        return view('transactions.edit', compact('transaction','accounts','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $account = Account::with('transactions')->find($transaction->account_id);
        
        $request->validate([
            'amount' => 'max:'.$account->balance.'|numeric|required',
            'transactionType' => 'required|in:Depósito,Retiro,Transferencia,Pago',
            'dateTime' => 'required|date',
        ],
        [
            'amount.max' => 'The amount cannot be greater than the account balance..'
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

        return redirect()->route('transactions.index')->with('success', 'Transaction soft deleted successfully.');
    }

    public function forceDelete(Transaction $transaction)
    {
        $transaction->forceDelete();

        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }

    public function recycle()
    {
        $recycledTransactions = Auth::user()->transactions()->onlyTrashed()->get();

        return view('transactions.recycle', compact('recycledTransactions'));
    }
}
