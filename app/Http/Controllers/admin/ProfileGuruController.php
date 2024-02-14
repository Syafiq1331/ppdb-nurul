<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProfileGuru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileGuruController extends Controller
{
    public function index()
    {
        $profileGurus = ProfileGuru::paginate(5);
        return view('admin.profile-guru.index', compact('profileGurus'));
    }

    public function create()
    {
        return view('admin.profile-guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:laki-laki,perempuan',
            'alamat' => 'nullable|string',
            'email' => 'required|email|unique:profile_guru,email',
            'nomor_whatsapp' => 'nullable|string',
            'posisi_pekerjaan' => 'nullable|string',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        // Proses upload foto profil
        if ($request->hasFile('foto_profil')) {
            $fotoProfil = $request->file('foto_profil');
            $path = $fotoProfil->storeAs('public/images/foto_guru', $fotoProfil->getClientOriginalName());

            // Remove the 'public/' prefix from the path
            $path = str_replace('public/', '', $path);
        }

        // Simpan data ke dalam database
        ProfileGuru::create([
            'nama_depan' => $request->input('nama_depan'),
            'nama_belakang' => $request->input('nama_belakang'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
            'nomor_whatsapp' => $request->input('nomor_whatsapp'),
            'posisi_pekerjaan' => $request->input('posisi_pekerjaan'),
            'foto_profil' => isset($path) ? $path : null,
            'deskripsi' => $request->input('deskripsi'),
        ]);

        return redirect()->route('list-guru.index')->with('success', 'Data guru berhasil disimpan.');
    }


    public function show($id)
    {
        $profileGuru = ProfileGuru::findOrFail($id);
        return view('admin.profile-guru.show', compact('profileGuru'));
    }

    public function edit($id)
    {
        $profileGuru = ProfileGuru::findOrFail($id);
        return view('admin.profile-guru.edit', compact('profileGuru'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:laki-laki,perempuan',
            'alamat' => 'nullable|string',
            'email' => 'required|email|unique:profile_guru,email,' . $id,
            'nomor_whatsapp' => 'nullable|string',
            'posisi_pekerjaan' => 'nullable|string',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        $profileGuru = ProfileGuru::findOrFail($id);

        // Proses upload foto profil jika ada file baru diupload
        if ($request->hasFile('foto_profil')) {
            $fotoProfil = $request->file('foto_profil');
            $path = $fotoProfil->storeAs('public/images/foto_guru', $fotoProfil->getClientOriginalName());

            // Remove the 'public/' prefix from the path
            $path = str_replace('public/', '', $path);

            // Delete the old image file if it exists
            if ($profileGuru->foto_profil) {
                Storage::delete('public/' . $profileGuru->foto_profil);
            }

            // Update the profile with the new file path
            $profileGuru->update([
                'foto_profil' => $path,
            ]);
        }

        // Update other fields
        $profileGuru->update([
            'nama_depan' => $request->input('nama_depan'),
            'nama_belakang' => $request->input('nama_belakang'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
            'nomor_whatsapp' => $request->input('nomor_whatsapp'),
            'posisi_pekerjaan' => $request->input('posisi_pekerjaan'),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        return redirect()->route('list-guru.index')->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $profileGuru = ProfileGuru::findOrFail($id);

        // Hapus foto profil (jika ada)
        if ($profileGuru->foto_profil) {
            Storage::delete('public/' . $profileGuru->foto_profil);
        }

        // Hapus data guru
        $profileGuru->delete();

        return redirect()->route('list-guru.index')->with('success', 'Data guru berhasil dihapus.');
    }
}
