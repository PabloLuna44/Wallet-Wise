<?php

namespace App\Http\Controllers;

use App\Models\Usersloan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersloanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('userloans/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Usersloan $usersloan)
    {
        $user=Auth::id();
        $userLoan=Usersloan::where('id_user',$user);
        

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usersloan $usersloan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usersloan $usersloan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usersloan $usersloan)
    {
        //
    }
}
