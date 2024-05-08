<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'type', 'amount', 'investment_date', 'return', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
