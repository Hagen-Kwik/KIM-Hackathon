<?php

namespace Database\Seeders;

use App\Models\Podcast;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PodcastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Podcast::create([
            'judul' => "Dhammiko",
            'link' => "https://www.youtube.com/watch?v=T9AbyazB60I"
        ]);
        Podcast::create([
            'judul' => "Hagen",
            'link' => "https://www.youtube.com/watch?v=2fDcRu7J-6k&pp=ygUKaGFnZW4ga3dpaw%3D%3D"
        ]);
    }
}
