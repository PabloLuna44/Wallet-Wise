<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth')->only(['index','create']);
    }

    public function index()
    {
       $investments=Investment::all();
       return view('investment.index',compact('investments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('investment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        
        $request->validate([
            'type' => 'required|max:50',
            'amount'=> 'required|numeric',
            'investmentDate'=>'required|date',
            'return'=> 'required|numeric',
            'status'=> 'required',
        ]);

        
        Investment::create($request->all());

        return redirect()->route('investment.index')->with('success', 'Investment created succesfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Investment $investment)
    {
        return view('investment.show', compact('investment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Investment $investment)
    {
        return view('investment.update',compact('investment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Investment $investment)
    {
             
        $request->validate([
            'type' => 'required|max:50',
            'amount'=> 'required|numeric',
            'investmentDate'=>'required|date',
            'return'=> 'required|numeric',
            'status'=> 'required',
        ]);

        //Investment::where('id',$investment->id)->update($request->exept('_token','_method'));
        
        Investment::update($request->all());

        return redirect()->route('investment.index')->with('success', 'Investment created succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Investment $investment)
    {
        $investment->delete();
        return redirect()->route('investment.index')->with('success','delete investment');  
    
    }
}