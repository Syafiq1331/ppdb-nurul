<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'exam_id' => 'required|exists:exams,id',
            'question_text' => 'required',
            'choices.*.choice_text' => 'required',
            'choices.*.is_correct' => 'required|boolean',
        ]);

        // Simpan pertanyaan
        $question = Question::create([
            'exam_id' => $request->exam_id,
            'question_text' => $request->question_text,
        ]);

        // Simpan pilihan jawaban
        foreach ($request->choices as $choice) {
            $question->choices()->create($choice);
        }

        return redirect()->route('exams.show', $request->exam_id)->with('success', 'Pertanyaan berhasil ditambahkan.');
    }
}
