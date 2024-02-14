<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pemberitahuan;
use App\Models\Santri;
use Illuminate\Http\Request;

class PemberitahuanSiswaController extends Controller
{
    public function index()
    {
        $pemberitahuan = Pemberitahuan::first();
        return view('admin.pemberitahuan-siswa.index', compact('pemberitahuan'));
    }

    public function create()
    {
        return view('pemberitahuan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pemberitahuan' => 'required',
            'status' => 'required|in:publish,draft',
        ]);

        Pemberitahuan::create($request->all());

        return redirect()->route('pemberitahuan.index')
            ->with('success', 'Pemberitahuan created successfully.');
    }

    public function show(Pemberitahuan $pemberitahuan)
    {
        return view('pemberitahuan.show', compact('pemberitahuan'));
    }

    public function edit(Pemberitahuan $pemberitahuan)
    {
        return view('admin.pemberitahuan-siswa.edit', compact('pemberitahuan'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'text' => 'required',
            'status' => 'required|in:publish,draft',
        ]);

        $pemberitahuan = Pemberitahuan::findOrFail($id);
        $pemberitahuan->update($request->all());

        return redirect()->route('pemberitahuan.index')
            ->with('success', 'Pemberitahuan updated successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
        $pemberitahuan = Pemberitahuan::findOrFail($id);

        // Validasi
        $request->validate([
            'status' => 'required|in:publish,draft',
        ]);

        // Logika untuk mengubah status bayar
        $pemberitahuan->status = $request->status;
        $pemberitahuan->save();

        return redirect()->route('pemberitahuan.index')
            ->with('success', 'Status bayar berhasil diubah.');
    }


    public function destroy($id)
    {
        $pemberitahuan = Pemberitahuan::findOrFail($id);

        $pemberitahuan->delete();

        return redirect()->route('pemberitahuan.index')
            ->with('success', 'Pemberitahuan deleted successfully.');
    }
}
