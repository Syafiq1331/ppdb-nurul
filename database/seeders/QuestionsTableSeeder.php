<?php

namespace Database\Seeders;

use App\Models\Choice;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    public function run()
    {
        // Misalnya, kita akan menambahkan pertanyaan untuk ujian pertama
        $examId = 1;

        // Tambahkan pertanyaan
        $question1 = Question::create([
            'exam_id' => $examId,
            'question_text' => 'Berapakah hasil dari 5 + 3?',
            'jenjang_id' => 1,
        ]);

        // Tambahkan pilihan jawaban untuk pertanyaan
        Choice::create([
            'question_id' => $question1->id,
            'choice_text' => '8',
            'is_correct' => true,
        ]);

        Choice::create([
            'question_id' => $question1->id,
            'choice_text' => '10',
            'is_correct' => false,
        ]);

        // Tambahkan pertanyaan lainnya sesuai kebutuhan
    }
}
