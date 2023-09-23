<?php

namespace Database\Seeders;

use App\Models\Quiz;
use App\Models\QuizType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quizType = QuizType::all()->pluck('id')->first();

        Quiz::create([
            'title' => 'tes',
            'quiz_type_id' => $quizType,
        ]);
    }
}
