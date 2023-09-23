<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "SMP 4",
            'email' => "crjsmp4@gmail.com",
            'password' => "tes123",
            'status' => "admin",
            'school_id' => 2,
        ]);
        User::create([
            'name' => "b",
            'email' => "b@gmail.com",
            'password' => "b@gmail.com",
            'status' => "normal",
            'school_id' => 1,
        ]);
        
    }
}
