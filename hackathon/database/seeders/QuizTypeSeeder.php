<?php

namespace Database\Seeders;

use App\Models\QuizType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        QuizType::create([
            'quiz_type' => '0'
        ]);
        QuizType::create([
            'quiz_type' => '1'
        ]);
    }
}
