<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Jenjang;
use Illuminate\Http\Request;

class KategoriPertanyaanController extends Controller
{
    public function index()
    {
        $exams = Exam::all();
        return view('admin.kategori-pertanyaan.index', compact('exams'));
    }

    public function create()
    {
        $jenjang = Jenjang::all();
        return view('admin.kategori-pertanyaan.create', compact('jenjang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'exam_name' => 'required|string',
            'jenjang_id' => 'required|exists:jenjangs,id',
        ]);

        // return dd($request->all());

        // Hapus kunci yang tidak diinginkan dari array
        $examData = $request->except('_token');

        Exam::create($examData);

        return redirect()->route('kategori-pertanyaan.index')->with('success', 'Exam created successfully.');
    }


    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
        $jenjang = Jenjang::all();
        return view('admin.kategori-pertanyaan.edit', compact('exam', 'jenjang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'exam_name' => 'required|string',
            'jenjang_id' => 'required|exists:jenjangs,id',
        ]);

        $exam = Exam::findOrFail($id);

        $exam->update($request->all());

        return redirect()->route('kategori-pertanyaan.index')->with('success', 'Exam updated successfully.');
    }


    public function destroy($id)
    {
        // Temukan data Jenjang berdasarkan ID
        $exam = Exam::findOrFail($id);

        $exam->delete();

        return redirect()->route('kategori-pertanyaan.index')->with('success', 'Exam deleted successfully.');
    }
}
