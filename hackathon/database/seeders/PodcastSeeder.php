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
            'link' => "https://www.youtube.com/embed/T9AbyazB60I?si=O_ucisonQlEVEIhq"
        ]);
        Podcast::create([
            'judul' => "Hagen",
            'link' => "https://www.youtube.com/embed/2fDcRu7J-6k?si=_q71sFftv7zxtE8m"
        ]);
    }
}
