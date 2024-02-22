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
        $expenses=Expense::all();

        return view('expenses.index',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $request->validate([
        'description'=>['required'],
        'spending'=>['required'],
        'expenseDate'=>['required']
     ]);
     
     $expense=new Expense();
     $expense->description=$request->description;
     $expense->spending=$request->spending;
     $expense->expenseDate=$request->expenseDate;

     

     $expense->save();


     return redirect('/expense');

    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        return view('expenses.show',compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        return view('expenses.update',compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {

        $request->validate([
            'description'=>['required'],
            'spending'=>['required'],
            'expenseDate'=>['required']
         ]);
    
         $expense->description=$request->description;
         $expense->spending=$request->spending;
         $expense->expenseDate=$request->expenseDate;
    
         $expense->save();
    
    
         return view('expenses.show',compact('expense'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expense.index');
    }
}
