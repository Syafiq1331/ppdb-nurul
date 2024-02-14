<!-- resources/views/admin/profile-guru/edit.blade.php -->

@extends('layouts.admin', ['title' => 'Edit Profile Guru'])

@section('content')
    <div class="container-fluid">
        <h6 class="m-0 font-weight-bold text-primary">Edit Profile Guru</h6>
        <form action="{{ route('list-guru.update', $profileGuru->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Tampilkan data existing -->
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="nama_depan">Nama Depan:</label>
                    <input type="text" class="form-control" id="nama_depan" name="nama_depan"
                        value="{{ $profileGuru->nama_depan }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="nama_belakang">Nama Belakang:</label>
                    <input type="text" class="form-control" id="nama_belakang" name="nama_belakang"
                        value="{{ $profileGuru->nama_belakang }}" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="tanggal_lahir">Tanggal Lahir:</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                        value="{{ $profileGuru->tanggal_lahir }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="laki-laki" {{ $profileGuru->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>
                            Laki-laki
                        </option>
                        <option value="perempuan" {{ $profileGuru->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="alamat">Alamat:</label>
                    <textarea class="form-control" id="alamat" name="alamat">{{ $profileGuru->alamat }}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ $profileGuru->email }}" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="nomor_whatsapp">Nomor WhatsApp:</label>
                    <input type="text" class="form-control" id="nomor_whatsapp" name="nomor_whatsapp"
                        value="{{ $profileGuru->nomor_whatsapp }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="posisi_pekerjaan">Posisi Pekerjaan:</label>
                    <input type="text" class="form-control" id="posisi_pekerjaan" name="posisi_pekerjaan"
                        value="{{ $profileGuru->posisi_pekerjaan }}">
                </div>
            </div>
            <div class="row">
                <!-- Add this script in your blade file or in a separate JavaScript file -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        // Listen for the file input change event
                        $('#foto_profil').on('change', function() {
                            // Get the selected file
                            var file = $(this)[0].files[0];

                            // Display the selected image as a preview
                            if (file) {
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    $('#foto_preview').attr('src', e.target.result);
                                }
                                reader.readAsDataURL(file);
                            }
                        });
                    });
                </script>

                <!-- Your HTML code -->
                <div class="form-group col-md-6">
                    <label for="foto_profil">Foto Profil:</label>
                    <input type="file" class="form-control-file" id="foto_profil" name="foto_profil">
                    <img id="foto_preview" src="{{ asset('storage/' . $profileGuru->foto_profil) }}" alt="Foto Profil"
                        class="img-fluid mt-2" style="max-width: 200px;">
                </div>

                <div class="form-group col-md-6">
                    <label for="deskripsi">Deskripsi:</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $profileGuru->deskripsi }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
