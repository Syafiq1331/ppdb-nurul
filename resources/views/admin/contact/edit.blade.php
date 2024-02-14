@extends('layouts.admin', ['title' => 'Contact Yayasan Website'])

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('contact.update', $contact->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="{{ $contact->alamat }}">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="no_whatsapp" class="form-label">Nomor WhatsApp</label>
                            <input type="text" class="form-control" id="no_whatsapp" name="no_whatsapp"
                                value="{{ $contact->no_whatsapp }}">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $contact->email }}">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="jam_operasi" class="form-label">Jam Operasi</label>
                            <input type="text" class="form-control" id="jam_operasi" name="jam_operasi"
                                value="{{ $contact->jam_operasi }}">
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="alamat_gmaps" class="form-label">Alamat Google Maps</label>
                            <input type="text" class="form-control" id="alamat_gmaps" name="alamat_gmaps"
                                value="{{ $contact->alamat_gmaps }}">
                        </div>

                    </div>
                    <!-- Tambahkan input lain sesuai kebutuhan -->

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
