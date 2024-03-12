<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['amount', 'transactionType', 'dateTime',];

    public function account(){
        return $this->belongsTo(Account::class);
    }
}


