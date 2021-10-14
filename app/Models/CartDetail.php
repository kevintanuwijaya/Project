<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;

    public function cartDetails(){
        return $this->belongsTo(CartDetail::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
