<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usersloan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'loan_id'];

    function user(){
        return $this->belongsToMany(User::class);
    }
    function loan(){
        return $this->belongsToMany(Loan::class);
    }
    
}
