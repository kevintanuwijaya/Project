<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'price',
        'description',
        'picture'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function cartDetail(){
        return $this->belongsTo(CartDetail::class);
    }

    public function transactionDetail(){
        return $this->belongsTo(TransactionDetail::class);
    }
}
