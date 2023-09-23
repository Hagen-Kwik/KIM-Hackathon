<?php

namespace Database\Seeders;

use App\Models\LearningType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LearningTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LearningType::create([
            'learning_type' => "Video pembelajaran",
        ]);
        LearningType::create([
            'learning_type' => "Modul pembelajaran",
        ]);
        LearningType::create([
            'learning_type' => "Tugas",
        ]);
    }
}
