<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status'
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function transactionDetails(){
        return $this->hasMany(TransactionDetail::class);
    }
}
