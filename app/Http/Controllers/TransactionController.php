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
        $title = "Transactions";
        $user = Auth::user();
        $accounts = $user->accounts()->with('transactions')->get();

        return view('transactions.index', compact('accounts', 'title'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        $title = "Transactions Create";
        $user = Auth::user();
        $accounts = $user->accounts;


        return view('transactions.create', compact('accounts', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $account = $user->accounts()->find($request->account_id);

        $this->authorize('create', Transaction::class, $account);
        
        $request->validate(
            [
                'amount' => 'max:' . $account->balance . '|numeric|required|min:1',
                'transaction_type' => 'required|in:Depósito,Retiro,Transferencia,Pago',
                'date_time' => 'required|date',
                'account_id' => 'required|exists:accounts,id',
            ],
            [
                'amount.max' => 'The amount cannot be greater than the account balance..'
            ]
        );
        Transaction::create($request->all());
   
        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        $this->authorize('view', $transaction);
        $title = "Transactions Show";

        $account = Account::with('transactions')->find($transaction->account_id);

        $transactionData = [
            'type' => 'transactions',
            'id' => $transaction->id,
            'Amount' => $transaction->amount,
            'Transaction Type' => $transaction->transaction_type,
            'Date Time' => $transaction->date_time,
            'Account' => $account->account_type
        ];


        return view('transactions.show', compact('transactionData', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $this->authorize('update', $transaction);
        $title = "Transactions Edit";
        $accounts = Account::where('user_id', Auth::id())->get();
        return view('transactions.edit', compact('transaction', 'accounts', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $this->authorize('update', $transaction);
        $account = Account::with('transactions')->find($transaction->account_id);

        $request->validate(
            [
                'amount' => 'max:' . $account->balance . '|numeric|required',
                'transaction_type' => 'required|in:Depósito,Retiro,Transferencia,Pago',
                'date_time' => 'required|date',
            ],
            [
                'amount.max' => 'The amount cannot be greater than the account balance..'
            ]
        );

        $transaction->update([
            'amount' => $request->input('amount'),
            'transaction_type' => $request->input('transaction_type'),
            'date_time' => $request->input('date_time'),
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $this->authorize('delete', $transaction);
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction soft deleted successfully.');
    }

    public function forceDelete(Transaction $transaction)
    {
        $transaction->forceDelete();

        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }

    public function restore($id)
    {
        Transaction::withTrashed()->find($id)->restore();

        return redirect()->route('transactions.index')->with('success', 'Transaction restored successfully.');
    }

    


    public function recycle()
    {
        $title="Recycled Transactions";
        
        
        $recycledTransactions = Auth::user()->accounts()->with(['transactions' => function ($query) {
            $query->onlyTrashed();
        }])->get();
        
        

        return view('transactions.recycle', compact('recycledTransactions', 'title'));
    }
}

