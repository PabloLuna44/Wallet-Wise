<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans= Loan::all();
        return view('loans.index',compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('loans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount'=>'required|numeric',
            'interestRate'=>'required|numeric',
            'status'=>'required|in:Pendiente,Pagada,Vencido',
            'paymentDate'=>'required|date'
        ]);

        Loan::create($request->all());

        return redirect()->route('loans.index')->with('success','Loan created succesfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        return view('loans.show',compact('loan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        return view('loans.edit',compact('loan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loan)
    {
        
        $request->validate([
            'amount'=>'required|numeric',
            'interestRate'=>'required|numeric',
            'status'=>'required|in:Pendiente,Pagada,Vencido',
            'paymentDate'=>'required|date'
        ]);

        $loan->update($request->all());
        
        return redirect()->route('loans.index')->with('success','Loan created succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();
        
        return redirect()->route('loans.index')->with('success', 'loan deleted successfully.') ;
    }
}
