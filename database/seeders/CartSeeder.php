<?php

namespace Database\Seeders;
use App\Models\Cart;

use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = [2, 3];
        $length = count($userId);
        for($i=0; $i<$length; $i++){
            Cart::create([
                'user_id' => $userId[$i]
            ]);
        }
    }
}
