<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\User;
use App\Models\Usersloan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
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
        $title = "Loans Index";
        // Obtener el usuario autenticado
        $user = Auth::user();
        // Obtener todos los préstamos del usuario autenticado
        $loans = $user->loans;
        $loanIds = Usersloan::where('user_id', $user->id)->pluck('loan_id');
        $debtor = User::whereIn('id', $loanIds)->pluck('name');


        return view('loans.index', compact('loans','title','debtor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todos los usuarios para la lista despegable
        $users = User::all();
        $title = "Loans Create";

        return view('loans.create', compact('users','title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount'=>'required|numeric',
            'interest_rate'=>'required|numeric',
            'status'=>'required|in:Pendiente,Pagada,Vencido',
            'payment_date'=>'required|date',
        ]);

        // Crea el préstamo y lo guarda en la base de datos
        $loan = Loan::create($request->except('user_ids'));

        // Asocia el préstamo al usuario autenticado
        $user = Auth::user();
        $user->loans()->attach($loan->id);

        // Asocia los usuarios seleccionados al préstamo
        if ($request->filled('selectedUserIds')) {
            $selectedUserIds = explode(',', $request->input('selectedUserIds'));
            foreach ($selectedUserIds as $userId) {
                $loan->users()->attach($userId);
            }
        }

        return redirect()->route('loans.index')->with('success','Loan created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        $title = "Loans Show";
        
        return view('loans.show', compact('loan','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        $title = "Loans Edit";
        // Obtener todos los usuarios de la base de datos
        $users = User::all();

        // Pasar los datos del préstamo y los usuarios a la vista
        return view('loans.edit', compact('loan', 'users','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loan)
    {
        $request->validate([
            'amount'=>'required|numeric',
            'interest_rate'=>'required|numeric',
            'status'=>'required|in:Pendiente,Pagada,Vencido',
            'payment_date'=>'required|date'
        ]);

        // Actualizar los datos del préstamo
        $loan->update($request->all());

        // Actualizar la asociación entre el préstamo y los usuarios seleccionados
        $selectedUserIds = explode(',', $request->input('selectedUserIds'));
        $loan->users()->sync($selectedUserIds);

        return redirect()->route('loans.index')->with('success','Loan updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();
        
        return redirect()->route('loans.index')->with('success', 'Loan deleted successfully') ;
    }
}

