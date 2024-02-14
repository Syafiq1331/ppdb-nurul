<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Choice;
use App\Models\Question;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    public function index()
    {
        $choices = Choice::all();
        return view('admin.jawaban.index', compact('choices'));
    }

    public function create()
    {
        $questions = Question::all();
        return view('admin.jawaban.create', compact('questions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'choice_text' => 'required',
            'is_correct' => 'required|boolean',
            // tambahkan validasi sesuai kebutuhan
        ]);

        Choice::create($request->all());

        return redirect()->route('jawaban.index')
            ->with('success', 'Choice created successfully.');
    }

    public function show(Choice $choice)
    {
        return view('jawaban.show', compact('choice'));
    }

    public function edit($id)
    {
        $questions = Question::all();
        $choice = Choice::find($id);
        return view('admin.jawaban.edit', compact('choice', 'questions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'choice_text' => 'required',
            'is_correct' => 'required|boolean',
            // tambahkan validasi sesuai kebutuhan
        ]);

        // $profileGuru = ProfileGuru::findOrFail($id);

        $choice = Choice::find($id);

        $choice->update($request->all());

        return redirect()->route('jawaban.index')
            ->with('success', 'Choice updated successfully.');
    }

    public function destroy($id)
    {
        $choice = Choice::find($id);

        $choice->delete();

        return redirect()->route('jawaban.index')
            ->with('success', 'Choice deleted successfully.');
    }
}
