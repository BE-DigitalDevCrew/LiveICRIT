<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'username' => 'Admin',
            'email' => 'munachaps@gmail.com',
            'type' =>'Admin',
            'house_name' => 'Hearten',
            'email_verified_at' => now(),
            'password' => bcrypt('verysafepassword'),
            'admin' => 1,
            'approved_at' => now(),
        ]);
    }
}
