<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'interest_rate', 'status', 'payment_date'];

    public function users(){
        return $this->belongsToMany(User::class,'usersloans');
    }
}
