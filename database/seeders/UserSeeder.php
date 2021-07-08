<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Karyawan;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Karyawan
        $user = User::create([
            'name' => 'Fahrul Ihsan',
            'email' => 'fahrul@example.com',
            'password' => Hash::make("fahrul123"),
            'role' => 'karyawan',
        ]);
        
        $user = User::create([
            'name' => 'Ferdian Samsudin',
            'email' => 'ferdian@example.com',
            'password' => Hash::make("ferdian123"),
            'role' => 'karyawan',
        ]);
        
        $user = User::create([
            'name' => 'Yuda Gunara',
            'email' => 'yuda@example.com',
            'password' => Hash::make("yuda123"),
            'role' => 'karyawan',
        ]);
        
        $user = User::create([
            'name' => 'Prayoga',
            'email' => 'prayoga@example.com',
            'password' => Hash::make("prayoga123"),
            'role' => 'karyawan',
        ]);
        $user = Karyawan::create([
            'user_id' => '1',
            'alamat' => 'jl babenget no 6',
            'no_telpon' => 628967567543,
            'jumlah_cuti' => 23,
        ]);
        
        $user = Karyawan::create([
            'user_id' => '2',
            'alamat' => 'jl padjajaran no 94',
            'no_telpon' => 628967852321,
            'jumlah_cuti' => 15,
        ]);
        
        $user = Karyawan::create([
            'user_id' => '3',
            'alamat' => 'jl pahlawan no 23',
            'no_telpon' => 6289678567464,
            'jumlah_cuti' => 35,
        ]);

        $user = Karyawan::create([
            'user_id' => '4',
            'alamat' => 'jl pahlawan no 76',
            'no_telpon' => 6289856534534,
            'jumlah_cuti' => 40,
        ]);

        // Super Admin

        $user = User::create([
            'name' => 'Galih Purna',
            'email' => 'galih@example.com',
            'password' => Hash::make("galih123"),
            'role' => 'Super Admin',
        ]);
        
        // staf Hr

        $user = User::create([
            'name' => 'Iksan Darmawangsa',
            'email' => 'iksan@example.com',
            'password' => Hash::make("iksan123"),
            'role' => 'Staf HR',
        ]);
    }
}
