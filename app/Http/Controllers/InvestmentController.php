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
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Obtener todas las inversiones del usuario autenticado
        $investments = $user->investments;

        return view('investments.index', compact('investments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('investments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|max:50',
            'amount' => 'required|numeric',
            'investmentDate' => 'required|date',
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
        return view('investments.show', compact('investment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Investment $investment)
    {
        return view('investments.edit', compact('investment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Investment $investment)
    {
        $request->validate([
            'type' => 'required|max:50',
            'amount' => 'required|numeric',
            'investmentDate' => 'required|date',
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
        $investment->delete();
        return redirect()->route('investments.index')->with('success', 'Investment deleted successfully.');
    }
}
