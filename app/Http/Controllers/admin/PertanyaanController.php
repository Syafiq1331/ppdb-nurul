<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Exam;
use App\Models\Jenjang;

class PertanyaanController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('admin.pertanyaan.index', compact('questions'));
    }

    public function create()
    {
        $exams = Exam::all(); // Mengambil semua data exam untuk dropdown
        $jenjang = Jenjang::all(); // Mengambil semua data exam untuk dropdown
        return view('admin.pertanyaan.create', compact('exams', 'jenjang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'exam_id' => 'required|exists:exams,id',
            'question_text' => 'required',
            'jenjang_id' => 'required|exists:jenjangs,id',
        ]);

        Question::create($request->all());

        return redirect()->route('pertanyaan.index')
            ->with('success', 'Question created successfully.');
    }

    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    public function edit($id)
    {
        $exams = Exam::all(); // Mengambil semua data exam untuk dropdown
        $question = Question::find($id);
        $jenjang = Jenjang::all();
        return view('admin.pertanyaan.edit', compact('question', 'exams', 'jenjang'));
    }

    public function update(Request $request,  $id)
    {
        $request->validate([
            'exam_id' => 'required|exists:exams,id',
            'question_text' => 'required',
            'jenjang_id' => 'required|exists:jenjangs,id',
        ]);

        $question = Question::find($id);

        $question->update($request->all());

        return redirect()->route('pertanyaan.index')
            ->with('success', 'Question updated successfully.');
    }

    public function destroy($id)
    {
        $question = Question::find($id);

        // Memeriksa apakah pertanyaan dapat dihapus
        if (!$question->canDelete()) {
            return redirect()->route('pertanyaan.index')
                ->with('error', 'Cannot delete question as it is related to other records.');
        }

        $question->delete();

        return redirect()->route('pertanyaan.index')
            ->with('success', 'Question deleted successfully.');
    }
}
