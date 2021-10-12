<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Admin', 'Customer'];
        $length = count($roles);
        for($i=0; $i<$length; $i++){
            Role::create([
                'name' => $roles[$i]
            ]);
        }
    }
}
