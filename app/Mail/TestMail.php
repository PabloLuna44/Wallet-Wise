<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user=Auth::user();
        $title="Email Accounts";
        $userName=$user->name;
        $userEmail=$user->email;
        
        return $this->view('emails.accounts',compact('title','userName','userEmail'))
                    ->subject('Accouns PDF Mail') 
                    ->from('walletwise@contact.com'); 
    }

}
