<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    public function accountsPDF()
    {
        $title="Acounts PDF";
        $user = Auth::user();
        $accounts = $user->accounts;
        $userName=$user->name;
        $userEmail=$user->email;
        $pdf = PDF::loadView('pdf.accounts',compact('accounts','title','userName','userEmail'));
        return $pdf->download('Accounts.pdf');
    }
}
