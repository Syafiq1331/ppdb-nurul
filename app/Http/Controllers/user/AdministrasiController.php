<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\DokumenPendaftaran;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdministrasiController extends Controller
{
    public function index()
    {
        $santris = Santri::paginate(5);
        // $administrasi = $santri->dokumenPendaftaran;

        return view('user.administrasi.index', compact('santris'));
    }

    public function update($id)
    {
        $santri = Santri::findOrFail($id);

        // Logika untuk mengubah status bayar (contoh: dari 'Belum Bayar' menjadi 'Lunas')
        $santri->status_bayar = 'Sudah Bayar';
        $santri->save();

        return redirect()->route('administrasi.index')
            ->with('success', 'Status bayar berhasil diubah.');
    }
}
