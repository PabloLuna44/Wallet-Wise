<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Earning;

class EarningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $earnings = Earning::all();
        return view('earnings.index', compact('earnings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('earnings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|max:50',
            'gain' => 'required|numeric',
            'earningDate' => 'required|date',
        ]);

        Earning::create($request->all());

        return redirect()->route('earnings.index')->with('success', 'Earning created succesfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Earning $earning)
    {
        return view('earnings.show', compact('earning'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Earning $earning)
    {
        return view('earnings.edit', compact('earning'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Earning $earning)
    {
        $request->validate([
            'description' => 'required|max:50',
            'gain' => 'required|numeric',
            'earningDate' => 'required|date',
        ]);

        $earning->update($request->all());

        return redirect()->route('earnings.index')->with('success', 'Earning update successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Earning $earning)
    {
        $earning->delete();

        return redirect()->route('earnings.index')->with('success', 'Earning deleted successfully.');
    }
}
