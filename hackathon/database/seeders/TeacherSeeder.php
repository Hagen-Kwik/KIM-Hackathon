<?php

namespace Database\Seeders;

use App\Models\Learning;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id = Learning::all()->pluck('id')->first();
        Teacher::create([
            'teacherName' => "guru 1",
            'description' => "abc",
            'job_title' => "job title",
            'whatsapp' => "012334",
            'email' => 'asdqwe',
            'instagram' => "insta",
            'picture' => "https://id.visafoto.com/img/docs/zz_3x3cm.jpg",
            'learning_id' => $id,
        ]);
        Teacher::create([
            'teacherName' => "guru 2",
            'description' => "cde",
            'job_title' => "job title",
            'whatsapp' => "23123",
            'email' => 'qweqwe',
            'instagram' => "insta",
            'picture' => "https://id.visafoto.com/img/docs/zz_3x3cm.jpg",
            'learning_id' => $id,
        ]);
        Teacher::create([
            'teacherName' => "guru 14",
            'description' => "abc",
            'job_title' => "job title",
            'whatsapp' => "012334",
            'email' => 'asdqwe',
            'instagram' => "insta",
            'picture' => "https://id.visafoto.com/img/docs/zz_3x3cm.jpg",
            'learning_id' => $id,
        ]);
    }
}
