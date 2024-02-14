<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function index()
    {
        $visiMisiList = VisiMisi::all();
        return view('admin.visi-misi.index', compact('visiMisiList'));
    }

    public function create()
    {
        return view('admin.visi-misi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'visi' => 'required',
            'misi' => 'required',
        ]);

        VisiMisi::create([
            'visi' => $request->input('visi'),
            'misi' => $request->input('misi'),
        ]);

        return redirect()->route('visi-misi.index')->with('success', 'Data visi-misi berhasil disimpan.');
    }

    public function edit($id)
    {
        $visiMisi = VisiMisi::findOrFail($id);
        return view('admin.visi-misi.edit', compact('visiMisi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'visi' => 'required',
            'misi' => 'required',
        ]);

        $visiMisi = VisiMisi::findOrFail($id);
        $visiMisi->update([
            'visi' => $request->input('visi'),
            'misi' => $request->input('misi'),
        ]);

        return redirect()->route('visi-misi.index')->with('success', 'Data visi-misi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $visiMisi = VisiMisi::findOrFail($id);
        $visiMisi->delete();

        return redirect()->route('visi-misi.index')->with('success', 'Data visi-misi berhasil dihapus.');
    }
}
