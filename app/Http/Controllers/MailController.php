<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class MailController extends Controller
{


    public function EmailAccountsPDF(){

        $userEmail = Auth::user()->email;
        Mail::to($userEmail)->send(new TestMail());
        

        return redirect()->route('dashboard')->with('success', 'Email sent successfully');

    }

}
