<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\KirimEmail;
use App\Models\DokumenPendaftaran;
use App\Models\Jenjang;
use App\Models\Santri;
use App\Models\User;
use App\Models\WaliSantri;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function create()
    {
        $jenjang = Jenjang::all();
        return view('Auth.Register', compact('jenjang'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'jenjang' => 'required|exists:jenjangs,id',
            'email' => 'required|email|unique:users,email',
            'nama_ayah' => 'required|string|unique:wali_santri,nama_ayah',
            'nama_ibu' => 'required|string|unique:wali_santri,nama_ibu',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'password' => 'required|string|min:8',
        ]);

        // Membuat Santri terlebih dahulu
        $santri = Santri::create([
            'nama_lengkap' => $request->name,
            'jenjang_id' => $request->jenjang,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        // Membuat WaliSantri dan menyertakan ID Santri
        WaliSantri::create([
            'santri_id' => $santri->id,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
        ]);

        DokumenPendaftaran::create([
            'santri_id' => $santri->id,
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'santri_id' => $santri->id,
        ]);

        return redirect('/login')->with('sweetAlert', 'Silahkan login dengan email dan password yang sudah di daftarkan pas registrasi');
    }


    public function login()
    {
        return view('Auth.Login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;

            // Pemilihan SweetAlert berdasarkan role
            if ($role === 'superadmin' || $role === 'admin') {
                return redirect('/dashboard')->with('success', 'Selamat datang, ' . ucfirst($role) . '!');
            } elseif ($role === 'user') {
                return redirect('/dashboard')->with('success', 'Selamat datang peserta didik baru di website PPDB Pondok Daarul Huffazh!');
            }
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => 'Email Salah, masukkan email yang benar',
                'password' => 'Password salah, masukkan password yang benar'
            ]);
    }
}
