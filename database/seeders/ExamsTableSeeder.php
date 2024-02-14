<?php

namespace Database\Seeders;

use App\Models\Exam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExamsTableSeeder extends Seeder
{

    public function run()
    {
        Exam::create(['exam_name' => 'Ujian Matematika', 'jenjang_id' => 1]);
        Exam::create(['exam_name' => 'Ujian Bahasa Inggris', 'jenjang_id' => 1]);
    }
}
