@extends('layouts.admin', ['title' => 'Edit Profile Wali Siswa'])

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Profile Wali Siswa</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('profile-wali-siswa.update', $waliSantri->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nama_ayah">Nama Ayah:</label>
                            <input type="text" class="form-control" name="nama_ayah" value="{{ $waliSantri->nama_ayah }}"
                                required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="nama_ibu">Nama Ibu:</label>
                            <input type="text" class="form-control" name="nama_ibu" value="{{ $waliSantri->nama_ibu }}"
                                required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="pekerjaan_ayah">Pekerjaan Ayah:</label>
                            <input type="text" class="form-control" name="pekerjaan_ayah"
                                value="{{ $waliSantri->pekerjaan_ayah }}" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="pekerjaan_ibu">Pekerjaan Ibu:</label>
                            <input type="text" class="form-control" name="pekerjaan_ibu"
                                value="{{ $waliSantri->pekerjaan_ibu }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="alamat">Alamat Orang Tua:</label>
                            <input type="text" class="form-control" name="alamat" value="{{ $waliSantri->alamat }}"
                                required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="no_whatsapp">No Whatsapp:</label>
                            <input type="text" class="form-control" name="no_whatsapp"
                                value="{{ $waliSantri->no_whatsapp }}" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
