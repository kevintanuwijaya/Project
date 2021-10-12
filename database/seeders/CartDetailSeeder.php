<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CartDetail;

class CartDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $productId = [2, 3, 7];
        $quantity = [2, 2, 3];
        $length = count($productId);
        for($i=0; $i<$length; $i++){
            CartDetail::create([
                'cart_id' => 1, 
                'product_id' => $productId[$i],
                'quantity' => $quantity[$i],
            ]);
        }

        
        $productId = [1, 2, 3, 4, 5];
        $quantity = [2, 1, 3, 2, 1];
        $length = count($productId);
        for($i=0; $i<$length; $i++){
            CartDetail::create([
                'cart_id' => 2, 
                'product_id' => $productId[$i],
                'quantity' => $quantity[$i],
            ]);
        }
    }
}
