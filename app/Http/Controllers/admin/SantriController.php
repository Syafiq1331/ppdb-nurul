<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Jenjang;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDF;

class SantriController extends Controller
{
    public function index()
    {
        $santri = Santri::all();
        $jenjang = Jenjang::all();
        return view('admin.ListSantri.index', compact('santri', 'jenjang'));
    }

    public function pembayaranIndex()
    {
        $santri = Auth::user()->santri;
        return view('user.Pembayaran.index', compact('santri'));
    }

    public function generatePDF(Request $request)
    {
        // Mendapatkan jenjang dari request
        $jenjangId = $request->input('jenjang_id');

        // Mendapatkan siswa berdasarkan jenjang yang dipilih
        $siswa = Santri::where('jenjang_id', $jenjangId)->get();

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->loadView('user.Pembayaran.pdf', compact('siswa'));

        // Optional: Set paper size and orientation
        $pdf->setPaper('A4', 'landscape');

        // Optional: Download the PDF instead of displaying it
        return $pdf->download('Siswa yang telah daftar.pdf');

        // Display the PDF in the browser
        return $pdf->stream('Siswa yang telah daftar.pdf');
    }


    public function pembayaranProses(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Get the authenticated user's Santri model
        $santri = Santri::findOrFail(auth()->user()->santri->id);

        // Delete the previous image if it exists
        if ($santri->bukti_pembayaran) {
            Storage::delete('public/buktiTransfer/' . $santri->bukti_pembayaran);
        }

        if ($request->hasFile('bukti_pembayaran')) {
            $image = $request->file('bukti_pembayaran');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move the uploaded file to the public/buktiTransfer folder
            $image->storeAs('public/buktiTransfer', $imageName);

            // Update the 'bukti_pembayaran' column in the Santri model
            $santri->update(['bukti_pembayaran' => $imageName]);

            $imageUrl = asset('storage/buktiTransfer/' . $imageName);

            return redirect()->back()->with('success', 'Bukti pembayaran berhasil diunggah');
        }

        return redirect()->back()->with('error', 'Gagal mengunggah bukti pembayaran.');
    }
}
