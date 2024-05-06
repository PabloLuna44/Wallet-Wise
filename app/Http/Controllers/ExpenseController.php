<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::where('user_id', auth()->id())->get();
        $title = 'Expenses Index';

        

        return view('expenses.index', compact('expenses', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $title = 'Expenses Create';
        return view('expenses.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => ['required', 'string', 'max:255'],
            'spending' => ['required', 'numeric', 'min:0'],
            'expense_date' => ['required', 'date']
        ]);

        $expense = new Expense();
        $expense->description = $request->description;
        $expense->spending = $request->spending;
        $expense->expense_date = $request->expense_date;
        $expense->user_id = auth()->id();


        $expense->save();


        return redirect()->route('expenses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        $title = 'Expenses Show';
        $expenseData = [
            'type' => 'expenses', 
            'id' => $expense->id,
            'Description' => $expense->description,
            'Spending' => $expense->spending,
            'Expense Date' => $expense->expense_date
        ];
        return view('expenses.show', compact('expenseData','title',));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $title = 'Expenses Edit';
        return view('expenses.edit', compact('expense', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {

        $request->validate([
            'description' => ['required', 'string', 'max:255'],
            'spending' => ['required', 'numeric', 'min:0'],
            'expense_date' => ['required', 'date']
        ]);

        $expense->description = $request->description;
        $expense->spending = $request->spending;
        $expense->expense_date = $request->expense_date;

        $expense->save();


        return redirect()->route('expenses.show', compact('expense'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index');
    }
}
