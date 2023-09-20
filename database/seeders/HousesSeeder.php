<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HousesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Houses::create([
            'house_name' => 'Lorraine',
            'capacity' => '50',
            'house_head' =>'Munashe',
            'is_active' => 'Active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \App\Models\Houses::create([
            'house_name' => 'Hearten',
            'capacity' => '50',
            'house_head' =>'Munashe',
            'is_active' => 'Active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \App\Models\Houses::create([
            'house_name' => 'Wyresdale',
            'capacity' => '50',
            'house_head' =>'Munashe',
            'is_active' => 'Active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \App\Models\Houses::create([
            'house_name' => 'Oakdale',
            'capacity' => '50',
            'house_head' =>'Munashe',
            'is_active' => 'Active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
