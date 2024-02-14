@extends('layouts.admin', ['title' => 'Edit Profile Calon Santri'])

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profile Data Diri Calon Santri</h1>
        </div>

        <div class="row">
            <div class="w-100 card">
                <div class="row card-body">
                    <form method="POST" action="{{ route('profile-santri.update', auth()->user()->santri->id) }}"
                        enctype="multipart/form-data" class="w-100">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_lengkap">Nama Lengkap:</label>
                                            <input type="text" name="nama_lengkap" class="form-control form-control-user"
                                                value="{{ auth()->user()->santri ? auth()->user()->santri->nama_lengkap : 'Data Belum diisi' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username">Username:</label>
                                            <input type="text" name="username" class="form-control form-control-user"
                                                value="{{ auth()->user()->santri->username ? auth()->user()->santri->username : 'Data Belum diisi' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tempat Lahir : </label>
                                            <input type="text" name="tempat_lahir" class="form-control form-control-user"
                                                value="{{ auth()->user()->santri ? (auth()->user()->santri->tempat_lahir ? auth()->user()->santri->tempat_lahir : 'Data Belum diisi') : 'Data Belum diisi' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tanggal Lahir : </label>
                                            <input type="date" name="tanggal_lahir"
                                                class="form-control form-control-user"
                                                value="{{ auth()->user()->santri ? (auth()->user()->santri->tanggal_lahir ? auth()->user()->santri->tanggal_lahir : 'Data Belum diisi') : 'Data Belum diisi' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">NISN : </label>
                                            <input type="number" name="nisn" class="form-control form-control-user"
                                                value="{{ auth()->user()->santri ? (auth()->user()->santri->nisn ? auth()->user()->santri->nisn : 'Data Belum diisi') : 'Data Belum diisi' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Asal Sekolah : </label>
                                            <input type="text" name="asal_sekolah" class="form-control form-control-user"
                                                value="{{ auth()->user()->santri ? (auth()->user()->santri->asal_sekolah ? auth()->user()->santri->asal_sekolah : 'Data Belum diisi') : 'Data Belum diisi' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Alamat : </label>
                                            <input type="text" name="alamat" class="form-control form-control-user"
                                                value="{{ auth()->user()->santri ? (auth()->user()->santri->alamat ? auth()->user()->santri->alamat : 'Data Belum diisi') : 'Data Belum diisi' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="photo">Foto Profil:</label>
                                            <input type="file" name="photo" class="form-control-file" id="photoInput"
                                                onchange="previewImage()">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <img id="photoPreview" class="img-thumbnail w-75"
                                            src="{{ auth()->user()->santri->photo ? asset('storage/photosSantri/' . auth()->user()->santri->photo) : asset('assets/img/undraw_profile.svg') }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage() {
            var input = document.getElementById('photoInput');
            var preview = document.getElementById('photoPreview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
