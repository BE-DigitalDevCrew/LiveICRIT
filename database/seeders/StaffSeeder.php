<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          \App\Models\User::create([
            'username' => 'Staff',
            'email' => 'staff@icrit.com',
            'type' =>'Staff',
            'house_name' => 'Lorraine',
            'email_verified_at' => now(),
            'password' => bcrypt('verysafepassword'),
            'admin' => 2,
            'approved_at' => now(),
        ]);

        \App\Models\User::create([
            'username' => 'Staff',
            'email' => 'nigel.z@b-e.digital',
            'type' =>'Staff',
            'house_name' => 'Hearten',
            'email_verified_at' => now(),
            'password' => bcrypt('verysafepassword'),
            'admin' => 2,
            'approved_at' => now(),
        ]);


        \App\Models\User::create([
            'username' => 'Staff',
            'email' => 'munashe.c@b-e.digital',
            'type' =>'Staff',
            'house_name' => 'Oakdale',
            'email_verified_at' => now(),
            'password' => bcrypt('verysafepassword'),
            'admin' => 2,
            'approved_at' => now(),
        ]);

        \App\Models\User::create([
            'username' => 'Staff',
            'email' => 'itai.c@b-e.digital',
            'type' =>'Staff',
            'house_name' => 'Wyresdale',
            'email_verified_at' => now(),
            'password' => bcrypt('verysafepassword'),
            'admin' => 2,
            'approved_at' => now(),
        ]);
    
    }
}
