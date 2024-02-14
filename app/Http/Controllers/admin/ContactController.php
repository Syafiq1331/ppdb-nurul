<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::first();
        return view('admin.contact.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'alamat' => 'required',
            'no_whatsapp' => 'required',
            'email' => 'required|email',
            'jam_operasi' => 'required',
            'alamat_gmaps' => 'required',
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')
            ->with('success', 'Kontak berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contact.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'alamat' => 'required',
            'no_whatsapp' => 'required',
            'email' => 'required|email',
            'jam_operasi' => 'required',
            'alamat_gmaps' => 'required',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('contact.index')
            ->with('success', 'Kontak berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')
            ->with('success', 'Kontak berhasil dihapus.');
    }
}
