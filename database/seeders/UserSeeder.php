<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fullName = ['Kevin Tanuwijaya', 'Davin William Pratama','Jason Jason'];
        $roleId = [1, 2, 2];
        $address = ['Jl. Cibadak No.50-155, Cibadak, Kec. Astanaanyar, Kota Bandung, Jawa Barat 40241', 'Citra Garden 2 Blok H2 No. 12A, 1 No.16, RT.7/RW.12, Kalideres, Kec. Kalideres, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11840', 'Jl. Gapura, RT.001/RW.004, Panunggangan, Kec. Pinang, Kota Tangerang, Banten 15143'];
        $email = ['kevintanuwijaya@binus.ac.id', 'davin.pratama001@binus.ac.id','jason@binus.ac.id'];
        $password = ['123456', '123456','123456'];
        $length = count($fullName);
        for($i=0; $i<$length; $i++){
            User::create([
                'name' => $fullName[$i], 
                'gender' => 'Male',
                'role_id' => $roleId[$i],
                'address' => $address[$i],
                'email' => $email[$i],
                'password' => bcrypt($password[$i]),
            ]);
        }
    }
}
