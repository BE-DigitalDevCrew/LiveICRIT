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
            'name' => 'Staff',
            'email' => 'staff@icrit.com',
            'type' =>'Staff',
            'house_name' => 'Lorraine',
            'email_verified_at' => now(),
            'password' => bcrypt('verysafepassword'),
            'admin' => 0,
            'approved_at' => now(),
        ]);
    
    }
}
