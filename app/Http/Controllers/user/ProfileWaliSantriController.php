<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Santri;
use App\Models\WaliSantri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileWaliSantriController extends Controller
{
    public function index()
    {
        $santri = Auth::user()->santri;
        $waliSantri = $santri->waliSantri;
        return view('user.profileWaliSantri.index', compact('waliSantri'));
    }

    public function edit($id)
    {
        // Find the Santri record based on the provided $id
        $santri = Santri::find($id);


        // Assuming you have a WaliSantri relationship defined in your Santri model
        $waliSantri = $santri->waliSantri;
        // return dd($waliSantri);

        // Pass the retrieved data to the view for editing
        return view('user.profileWaliSantri.edit', compact('santri', 'waliSantri'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_whatsapp' => 'required|string|max:20',
        ]);

        // Find the WaliSantri model instance by ID
        $waliSantri = WaliSantri::findOrFail($id);

        // Update the model with the validated data
        $waliSantri->update($validatedData);

        // Redirect to a specific route or return a response as needed
        return redirect()->route('profile-wali-siswa.index')->with('success', 'Profile berhasil di update');
    }
}
