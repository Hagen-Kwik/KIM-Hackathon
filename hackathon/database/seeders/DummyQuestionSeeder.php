<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quizId = Quiz::all()->pluck('id')->first();

        Question::create([
            'question' => 'apa?',
            'optionA' => 'iya',
            'optionB' => 'bukan',
            'optionC' => 'bukan',
            'optionD' => 'bukan',
            'correctOption' => 'iya',
            'quiz_id' => $quizId,
        ]);
        Question::create([
            'question' => 'apa?',
            'optionA' => 'iya',
            'optionB' => 'bukan',
            'optionC' => 'bukan',
            'optionD' => 'bukan',
            'correctOption' => 'iya',
            'quiz_id' => $quizId,
        ]);
        Question::create([
            'question' => 'apa?',
            'optionA' => 'iya',
            'optionB' => 'bukan',
            'optionC' => 'bukan',
            'optionD' => 'bukan',
            'correctOption' => 'iya',
            'quiz_id' => $quizId,
        ]);
        Question::create([
            'question' => 'apa?',
            'optionA' => 'iya',
            'optionB' => 'bukan',
            'optionC' => 'bukan',
            'optionD' => 'bukan',
            'correctOption' => 'iya',
            'quiz_id' => $quizId,
        ]);
        Question::create([
            'question' => 'apa?',
            'optionA' => 'iya',
            'optionB' => 'bukan',
            'optionC' => 'bukan',
            'optionD' => 'bukan',
            'correctOption' => 'iya',
            'quiz_id' => $quizId,
        ]);
    }
}
