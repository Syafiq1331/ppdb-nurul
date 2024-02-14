<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\Pemberitahuan;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $santriTotal = Santri::all()->count();
        $santriBayar = Santri::whereNotNull('bukti_pembayaran')->count();
        $santriBelumBayar = Santri::whereNull('bukti_pembayaran')->count();
        $pemberitahuan = Pemberitahuan::where('status', 'publish')->first();


        $jumlahPerJenjang = Santri::join('jenjangs', 'siswa.jenjang_id', '=', 'jenjangs.id')
            ->select('siswa.jenjang_id', 'jenjangs.name as jenjang_name', DB::raw('COUNT(*) as total_siswa'))
            ->groupBy('siswa.jenjang_id', 'jenjangs.name')
            ->get();

        $jumlahPerGender = Santri::select('jenis_kelamin', DB::raw('COUNT(*) as total_siswa'))
            ->groupBy('jenis_kelamin')
            ->get();

        return view('Dashboard', compact('santriTotal', 'santriBayar', 'jumlahPerJenjang', 'santriBelumBayar', 'jumlahPerGender', 'pemberitahuan'));
    }
}
