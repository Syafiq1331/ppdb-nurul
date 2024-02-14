<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileSantriController extends Controller
{
    public function index()
    {
        return view('user.profileSantri.index');
    }

    public function edit()
    {
        return view('user.profileSantri.edit');
    }

    public function update(Request $request, $id)
    {
        // Validasi form request
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan kebutuhan
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'nisn' => 'nullable|string|max:20|unique:siswa,nisn,' . $id,
            'asal_sekolah' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',

        ], [
            'nisn.unique' => 'NISN telah digunakan oleh santri lain.',
        ]);

        // Ambil data Santri yang akan diupdate
        $santri = Santri::find($id);

        // Perbarui atribut Santri
        $santri->nama_lengkap = $request->nama_lengkap;
        $santri->username = $request->username;
        $santri->tempat_lahir = $request->tempat_lahir;
        $santri->tanggal_lahir = $request->tanggal_lahir;
        $santri->nisn = $request->nisn;
        $santri->asal_sekolah = $request->asal_sekolah;
        $santri->alamat = $request->alamat;
        // ...Perbarui atribut lainnya sesuai kebutuhan

        // Hapus foto profil lama jika ada dan ada file baru yang diunggah
        if ($santri->photo && $request->hasFile('photo')) {
            Storage::delete('public/photosSantri/' . $santri->photo);
        }
        // Perbarui foto profil jika ada file yang diunggah
        if ($request->hasFile('photo')) {
            $hashedName = Str::random(20); // Ubah panjang hash sesuai kebutuhan
            $filename = $hashedName . '.' . $request->file('photo')->getClientOriginalExtension();
            $photoPath = $request->file('photo')->storeAs('public/photosSantri', $filename);
            $santri->photo = $filename;
        }

        // Simpan perubahan
        $santri->save();

        // Redirect ke halaman profil dengan pesan sukses
        return redirect()->route('profile-siswa.index')->with('success', 'Data berhasil diperbarui.');
    }
}
