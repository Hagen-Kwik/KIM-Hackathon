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
            'question' => 'Apa itu KIM Anyelir?',
            'optionA' => 'A',
            'optionB' => 'B',
            'optionC' => 'C',
            'optionD' => 'D',
            'correctOption' => 'A',
            'quiz_id' => $quizId,
        ]);
        Question::create([
            'question' => 'Mengapa KIM Anyelir?',
            'optionA' => 'A',
            'optionB' => 'B',
            'optionC' => 'C',
            'optionD' => 'D',
            'correctOption' => 'D',
            'quiz_id' => $quizId,
        ]);
        Question::create([
            'question' => 'Bagaimana KIM Anyelir?',
            'optionA' => 'A',
            'optionB' => 'B',
            'optionC' => 'C',
            'optionD' => 'D',
            'correctOption' => 'B',
            'quiz_id' => $quizId,
        ]);
        Question::create([
            'question' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua?',
            'optionA' => 'A',
            'optionB' => 'B',
            'optionC' => 'C',
            'optionD' => 'D',
            'correctOption' => 'A',
            'quiz_id' => $quizId,
        ]);
        Question::create([
            'question' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat?',
            'optionA' => 'A',
            'optionB' => 'B',
            'optionC' => 'C',
            'optionD' => 'D',
            'correctOption' => 'C',
            'quiz_id' => $quizId,
        ]);
    }
}
