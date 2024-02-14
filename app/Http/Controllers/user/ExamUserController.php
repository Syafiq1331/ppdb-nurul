<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Choice;
use App\Models\Result;
use App\Models\User;
use App\Models\UserAnswer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF;

class ExamUserController extends Controller
{
    public function startExam($examId)
    {
        $user = Auth::user();

        if ($user->santri->score != null) {
            return redirect('/dashboard')->with('warning', 'Kamu sudah melakukan ujian');
        }

        $exam = Exam::findOrFail($examId);
        $questions = Question::with('choices')->where('exam_id', $exam->id)->get();

        // Mulai ujian, simpan waktu mulai pada sesi pengguna
        session(['exam_start_time' => Carbon::now()]);

        return view('exams.start', compact('exam', 'questions'));
    }

    public function submitExam(Request $request, $examId)
    {
        // Simpan jawaban pengguna ke dalam database
        $user = Auth::user();

        // Hitung waktu ujian
        $examStartTime = session('exam_start_time');
        $examEndTime = now();
        $examDuration = $examEndTime->diffInMinutes($examStartTime);



        $score = 0;

        foreach ($request->input('answers') as $questionId => $choiceId) {
            $choice = Choice::find($choiceId);

            // Jika pilihan tersebut benar, tambahkan nilai ke skor
            if ($choice && $choice->is_correct) {
                $score++;
            }

            $userExamResult = $user->results()->create([
                'exam_id' => $examId,
                'duration' => $examDuration,
                'score' => 0,
            ]);
        }

        // Simpan skor ke dalam hasil ujian
        $userExamResult->update(['score' => $score]);

        // Hapus sesi waktu mulai
        session()->forget('exam_start_time');

        return redirect()->route('exams.result', $userExamResult->id);
    }


    public function showResult($resultId, Request $request)
    {
        $result = Result::where('id', $resultId)->with('exam')->firstOrFail();

        // Menentukan kelas berdasarkan skor
        $score = $result->score;

        if ($score >= 86 && $score <= 100) {
            $class = 'A';
        } elseif ($score >= 71 && $score <= 85) {
            $class = 'B';
        } elseif ($score >= 50 && $score <= 70) {
            $class = 'C';
        } else {
            $class = 'D';
        }

        // Update nilai pada tabel users
        Auth::user()->santri->update(['score' => 'Kelas ' .  $class]);
        $user = Auth::user()->santri;

        // Check if the request wants to download the PDF
        if ($request->has('download_pdf')) {

            $pdf = PDF::loadView('exams.hasil-ujian', compact('result', 'class', 'user'));

            return $pdf->download('hasil_ujian.pdf');
        }

        return view('exams.result', compact('result', 'class', 'user'));
    }
}
