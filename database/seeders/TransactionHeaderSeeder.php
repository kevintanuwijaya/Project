<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TransactionHeader;

class TransactionHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = [2, 2, 2, 2, 2];
        $status = ['PAID', 'PAID', 'PAID', 'PAID', 'PAID'];
        $length = count($userId);
        for($i=0; $i<$length; $i++){
            TransactionHeader::create([
                'user_id' => $userId[$i],
                'status' => $status[$i]
            ]);
        }
    }
}
