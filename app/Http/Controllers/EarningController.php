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
        $title="Earnings Index";
        $earnings = Earning::where('user_id', auth()->id())->get();
        return view('earnings.index', compact('earnings','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Earnings Create";
        return view('earnings.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|max:50',
            'gain' => 'required|numeric',
            'earning_date' => 'required|date',
        ]);
        $request['user_id'] = auth()->id();

        Earning::create($request->all());

        return redirect()->route('earnings.index')->with('success', 'Earning created succesfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Earning $earning)
    {
        $this->authorize('view', $earning);
        $title="Earnings Show";

        $earningData=[
            'type' => 'earnings', 
            'id' => $earning->id,
            'Description' => $earning->description,
            'Gain' => $earning->gain,
            'Earning Date' => $earning->earning_date,
        ];

        return view('earnings.show', compact('earningData','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Earning $earning)
    {
        $this->authorize('update', $earning);
        $title="Earnings Edit";
        return view('earnings.edit', compact('earning','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Earning $earning)
    {
        $this->authorize('update', $earning);
        $request->validate([
            'description' => 'required|max:50',
            'gain' => 'required|numeric',
            'earning_date' => 'required|date',
        ]);

        $earning->user_id = auth()->id();

        $earning->update($request->all());

        return redirect()->route('earnings.index')->with('success', 'Earning update successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Earning $earning)
    {
        $this->authorize('delete', $earning);
        $earning->delete();

        return redirect()->route('earnings.index')->with('success', 'Earning deleted successfully.');
    }
}
