<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Santri;
// use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $users = Santri::all()->toArray(); // Convert the collection to an array

        $pdf = PDF::loadView('exams.hasil-ujian', compact('users'));

        return $pdf->download('hasil_ujian.pdf');
    }
}
