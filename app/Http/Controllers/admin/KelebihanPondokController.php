<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KelebihanYayasan;
use Illuminate\Http\Request;

class KelebihanPondokController extends Controller
{
    public function index()
    {
        $kelebihans = KelebihanYayasan::paginate(5);
        return view('admin.kelebihan-yayasan.index', compact('kelebihans'));
    }

    public function create()
    {
        return view('admin.kelebihan-yayasan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
        ]);

        KelebihanYayasan::create($request->all());

        return redirect()->route('admin.kelebihan-yayasan.index')
            ->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $kelebihan = KelebihanYayasan::findOrFail($id);
        return view('admin.kelebihan-yayasan.edit', compact('kelebihan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'icon' => 'required'
        ]);

        $kelebihan = KelebihanYayasan::findOrFail($id);

        $kelebihan->update($request->all());

        return redirect()->route('kelebihan-yayasan.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kelebihan = KelebihanYayasan::findOrFail($id);
        $kelebihan->delete();

        return redirect()->route('kelebihan-yayasan.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
