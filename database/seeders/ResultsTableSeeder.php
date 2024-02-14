<?php

namespace Database\Seeders;

use App\Models\Result;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResultsTableSeeder extends Seeder
{
    public function run()
    {
        // Misalnya, kita akan menambahkan hasil ujian untuk beberapa siswa
        $examId = 1; // ID ujian yang sudah dibuat
        $userIds = [1, 2, 3]; // ID siswa yang sudah terdaftar

        foreach ($userIds as $userId) {
            Result::create([
                'user_id' => $userId,
                'exam_id' => $examId,
                'score' => rand(0, 100), // Skor ujian acak untuk contoh
            ]);
        }
    }
}
