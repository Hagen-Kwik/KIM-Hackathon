<?php

namespace Database\Seeders;

use App\Models\Modul;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Learning::create([
            'title' => "Pantun",
            'description' => "lorem ipsum 50",
            'picture' => "tes",
            'starts_at' => Carbon::parse('2023-09-25 10:00:00'),
            'ends_at' => Carbon::parse('2023-09-25 12:00:00'),
            'school_id' => 2,
        ]);
    }
}
