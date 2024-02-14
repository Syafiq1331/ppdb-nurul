<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->santri->status_bayar == 'Belum Bayar') {
            return redirect('/dashboard')->with('warning', 'Kamu belum melakukan pembayaran, silahkan melakukan pembayaran terlebih dahulu');
        }

        $jenjangId = $user->santri->jenjang->id;

        // Retrieve exams for the specific jenjang
        $exams = Exam::where('jenjang_id', $jenjangId)->get();

        return view('exams.index', compact('exams'));
    }

    public function show($id)
    {
        $exam = Exam::with('questions.choices')->find($id);
        return view('exams.show', compact('exam'));
    }
}
