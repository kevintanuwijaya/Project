<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['TV', 'Laptop', 'Smartphone'];
        $length = count($name);
        for($i=0; $i<$length; $i++){
            Category::create([
                'name' => $name[$i], 
            ]);
        }
    }
}
