<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Jenjang;
use Illuminate\Http\Request;

class JenjangController extends Controller
{
    public function index()
    {
        $jenjang = Jenjang::all();
        return view('admin.jenjang.index', compact('jenjang'));
    }

    public function create()
    {
        return view('admin.jenjang.create'); // Gantilah 'jenjang.create' sesuai dengan nama view formulir tambah Anda
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir tambah
        $request->validate([
            'name' => 'required|string|max:255',
            'kuota' => 'required|integer',
            // Tambahkan validasi lainnya sesuai kebutuhan
        ]);

        // Simpan data baru ke dalam database
        Jenjang::create([
            'name' => $request->input('name'),
            'kuota' => $request->input('kuota'),
            // Tambahkan atribut lainnya sesuai kebutuhan
        ]);

        // Redirect ke halaman yang sesuai atau berikan respons sesuai kebutuhan
        return redirect()->route('jenjang.index')->with('success', 'Data Jenjang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jenjang = Jenjang::find($id);

        return view('admin.jenjang.edit', compact('jenjang'));
    }

    public function update(Request $request, Jenjang $jenjang)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'name' => 'required|string|max:255',
            'kuota' => 'required|integer',
        ]);

        // Update data model Jenjang
        $jenjang->update([
            'name' => $request->input('name'),
            'kuota' => $request->input('kuota'),
            // Tambahkan atribut lainnya sesuai kebutuhan
        ]);

        // Redirect ke halaman yang sesuai atau berikan respons sesuai kebutuhan
        return redirect()->route('jenjang.index')->with('success', 'Data Jenjang berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Temukan data Jenjang berdasarkan ID
        $jenjang = Jenjang::findOrFail($id);

        // Hapus data Jenjang
        $jenjang->delete();

        // Kirim respons JSON ke client
        return response()->json(['success' => true]);
    }
}
