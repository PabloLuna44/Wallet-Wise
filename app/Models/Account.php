<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = ['accountType', 'balance'];


    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
}
