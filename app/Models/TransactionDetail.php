<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    public function transactionHeader(){
        return $this->belongsTo(TransactionHeader::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
