<?php

namespace Database\Seeders;

use App\Models\karya_pilihan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        karya_pilihan::create([
            "judul" => 'Making Animation',
            "link" => 'https://imgdb.net/storage/uploads/74a49fcf4b7741dadc962340bb5f88369f2d815df079f3e9afb4cf24b4a79416.png',
            "vote" => 17,
        ]);
        karya_pilihan::create([
            "judul" => 'Making Website',
            "link" => 'https://imgdb.net/storage/uploads/34ddf730178aaeeb4560797b998c110661026573400e0ec363248a7ea88e051a.png',
            "vote" => 17,
        ]);
        karya_pilihan::create([
            "judul" => 'Taking advantage of AR for studying Science',
            "link" => 'https://i.ibb.co/1vrq9hD/Screenshot-2023-09-23-at-18-12-40.png',
            "vote" => 11,
        ]);
    }
}
