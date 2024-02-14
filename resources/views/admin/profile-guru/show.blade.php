<!-- resources/views/admin/profile-guru/show.blade.php -->

@extends('layouts.admin', ['title' => 'Detail Profile Guru'])

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <label for="nama_depan"><strong>Nama Depan:</strong></label>
                                    <input type="text" class="form-control" id="nama_depan"
                                        value="{{ $profileGuru->nama_depan }}" readonly>
                                </div>

                                <div class="form-group my-2">
                                    <label for="nama_belakang"><strong>Nama Belakang:</strong></label>
                                    <input type="text" class="form-control" id="nama_belakang"
                                        value="{{ $profileGuru->nama_belakang }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <label for="tanggal_lahir"><strong>Tanggal Lahir:</strong></label>
                                    <input type="text" class="form-control" id="tanggal_lahir"
                                        value="{{ $profileGuru->tanggal_lahir }}" readonly>
                                </div>

                                <div class="form-group my-2">
                                    <label for="jenis_kelamin"><strong>Jenis Kelamin:</strong></label>
                                    <input type="text" class="form-control" id="jenis_kelamin"
                                        value="{{ $profileGuru->jenis_kelamin }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <label for="email"><strong>Email:</strong></label>
                                    <input type="email" class="form-control" id="email"
                                        value="{{ $profileGuru->email }}" readonly>
                                </div>

                                <div class="form-group my-2">
                                    <label for="nomor_whatsapp"><strong>Nomor WhatsApp:</strong></label>
                                    <input type="text" class="form-control" id="nomor_whatsapp"
                                        value="{{ $profileGuru->nomor_whatsapp }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <label for="alamat"><strong>Alamat:</strong></label>
                                    <textarea readonly type="text" class="form-control" id="alamat" name="" id="" cols="30"
                                        rows="10">{{ $profileGuru->alamat }}</textarea>
                                </div>

                                <div class="form-group my-2">
                                    <label for="posisi_pekerjaan"><strong>Posisi Pekerjaan:</strong></label>
                                    <input type="text" class="form-control" id="posisi_pekerjaan"
                                        value="{{ $profileGuru->posisi_pekerjaan }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group my-2">
                                    <label for="deskripsi"><strong>Deskripsi:</strong></label>
                                    <textarea class="form-control" id="deskripsi" readonly>{{ $profileGuru->deskripsi }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group my-2">
                            <label for="foto_profil"><strong>Foto Profil:</strong></label>
                            @if ($profileGuru->foto_profil)
                                <img src="{{ asset('path/to/your/images/' . $profileGuru->foto_profil) }}" alt="Foto Profil"
                                    class="img-fluid">
                            @else
                                No Image
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
