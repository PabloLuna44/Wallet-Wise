<?php

namespace App\Models;

use Faker\Core\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable = ['amount', 'transactionType','account_id', 'dateTime',];

    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function files(){
        return $this->hasMany(File::class);
    }
}


