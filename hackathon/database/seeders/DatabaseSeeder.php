<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            FinanceSeeder::class,
            AboutUsSeeder::class,
            QuizTypeSeeder::class,
            DummyQuizSeeder::class,
            DummyQuestionSeeder::class,
            SchoolSeeder::class,
            UserSeeder::class,
            LearningSeeder::class,
            LearningTypeSeeder::class,
            PodcastSeeder::class,
            VoteSeeder::class,
        ]);
    }
}
