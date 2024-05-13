<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['index', 'create']);
    }

    public function index()
    {
        $title="Investment Index";
        // Obtener el usuario autenticado
        $user = Auth::user();
        // Obtener todas las inversiones del usuario autenticado
        $investments = $user->investments;
        
        return view('investments.index', compact('investments','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Investment Create";
        return view('investments.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Investment::class);

        $request->validate([
            'type' => 'required|max:50',
            'amount' => 'required|numeric',
            'investment_date' => 'required|date',
            'return' => 'required|numeric',
            'status' => 'required|in:En curso,Finalizado',
        ]);

        $user = Auth::user();
        $user->investments()->create($request->all());

        return redirect()->route('investments.index')->with('success', 'Investment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Investment $investment)
    {
        $this->authorize('view', $investment);

        $title="Investment Show";
        $investmentData = [
            'type' => 'investments',
            'id' => $investment->id,
            'Type Investment' => $investment->type, 
            'Amount' => $investment->amount,
            'Investment Date' => $investment->investment_date,
            'Return' => $investment->return,
            'Status' => $investment->status
            
        ];
        return view('investments.show', compact('title','investmentData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Investment $investment)
    {
        $this->authorize('update', $investment);

        $title="Investment Edit";
        return view('investments.edit', compact('investment','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Investment $investment)
    {
        $this->authorize('update', $investment);

        $request->validate([
            'type' => 'required|max:50',
            'amount' => 'required|numeric',
            'investment_date' => 'required|date',
            'return' => 'required|numeric',
            'status' => 'required|in:En curso,Finalizado',
        ]);

        $investment->update($request->all());

        return redirect()->route('investments.index')->with('success', 'Investment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Investment $investment)
    {
        $this->authorize('delete', $investment);
        
        $investment->delete();
        return redirect()->route('investments.index')->with('success', 'Investment deleted successfully.');
    }
}
