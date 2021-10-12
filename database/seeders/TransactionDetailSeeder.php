<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TransactionDetail;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productId = [1, 2, 3];
        $quantity = [2, 1, 3];
        $length = count($productId);
        for($i=0; $i<$length; $i++){
            TransactionDetail::create([
                'transactionHeader_id' => 1, 
                'product_id' => $productId[$i],
                'quantity' => $quantity[$i],
            ]);
        }

        $productId = [3, 5, 1];
        $quantity = [2, 2, 3];
        $length = count($productId);
        for($i=0; $i<$length; $i++){
            TransactionDetail::create([
                'transactionHeader_id' => 2, 
                'product_id' => $productId[$i],
                'quantity' => $quantity[$i],
            ]);
        }

        $productId = [6, 10, 9];
        $quantity = [1, 1, 3];
        $length = count($productId);
        for($i=0; $i<$length; $i++){
            TransactionDetail::create([
                'transactionHeader_id' => 3, 
                'product_id' => $productId[$i],
                'quantity' => $quantity[$i],
            ]);
        }

        $productId = [8, 1, 3];
        $quantity = [2, 1, 1];
        $length = count($productId);
        for($i=0; $i<$length; $i++){
            TransactionDetail::create([
                'transactionHeader_id' => 4, 
                'product_id' => $productId[$i],
                'quantity' => $quantity[$i],
            ]);
        }

        $productId = [6, 10, 2];
        $quantity = [1, 1, 1];
        $length = count($productId);
        for($i=0; $i<$length; $i++){
            TransactionDetail::create([
                'transactionHeader_id' => 5, 
                'product_id' => $productId[$i],
                'quantity' => $quantity[$i],
            ]);
        }

        
    }
}
