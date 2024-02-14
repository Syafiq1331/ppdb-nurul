@extends('layouts.admin', ['title' => 'Profile Calon Santri'])

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profile Data Diri Calon Santri</h1>
        </div>
        <div class="row">

            <div class="d-flex justify-content-end w-100">
                <a href="{{ '/user/profile-santri/' . auth()->user()->id . '/edit' }}">
                    <button class="btn btn-primary mb-2">
                        <i class="fas fa-fw fa-edit pr-2"></i>
                        Edit Data
                    </button>
                </a>
            </div>

            <div class="w-100 card">
                <div class="row card-body">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Lengkap : </label>
                                    <input type="text" class="form-control form-control-user" readonly
                                        value="{{ auth()->user()->santri ? (auth()->user()->santri->nama_lengkap ? auth()->user()->santri->nama_lengkap : 'Data Belum diisi') : 'Data Belum diisi' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Username : </label>
                                    <input type="text" class="form-control form-control-user" readonly
                                        value="{{ auth()->user()->santri ? (auth()->user()->santri->username ? auth()->user()->santri->username : 'Data Belum diisi') : 'Data Belum diisi' }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jenis Kelamin : </label>
                                    <input type="text" class="form-control form-control-user" readonly
                                        value="{{ auth()->user()->santri ? (auth()->user()->santri->jenis_kelamin ? auth()->user()->santri->jenis_kelamin : 'Data Belum diisi') : 'Data Belum diisi' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jenjang yang dipilih : </label>
                                    <input type="text" class="form-control form-control-user" readonly
                                        value="{{ auth()->user()->santri && auth()->user()->santri->jenjang ? auth()->user()->santri->jenjang->name : 'Data Belum diisi' }}" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tempat Lahir : </label>
                                    <input type="text" class="form-control form-control-user" readonly
                                        value="{{ auth()->user()->santri ? (auth()->user()->santri->tempat_lahir ? auth()->user()->santri->tempat_lahir : 'Data Belum diisi') : 'Data Belum diisi' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tanggal Lahir : </label>
                                    <input type="text" class="form-control form-control-user" readonly
                                        value="{{ auth()->user()->santri ? (auth()->user()->santri->tanggal_lahir ? auth()->user()->santri->tanggal_lahir : 'Data Belum diisi') : 'Data Belum diisi' }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">NISN : </label>
                                    <input type="text" class="form-control form-control-user" readonly
                                        value="{{ auth()->user()->santri ? (auth()->user()->santri->nisn ? auth()->user()->santri->nisn : 'Data Belum diisi') : 'Data Belum diisi' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Asal Sekolah : </label>
                                    <input type="text" class="form-control form-control-user" readonly
                                        value="{{ auth()->user()->santri ? (auth()->user()->santri->asal_sekolah ? auth()->user()->santri->asal_sekolah : 'Data Belum diisi') : 'Data Belum diisi' }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Alamat : </label>
                                    <input type="text" class="form-control form-control-user" readonly
                                        value="{{ auth()->user()->santri ? (auth()->user()->santri->alamat ? auth()->user()->santri->alamat : 'Data Belum diisi') : 'Data Belum diisi' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 w-100">
                        <label>Profile Santri </label>
                        @if (auth()->user()->santri && auth()->user()->santri->photo)
                            <img class="img-thumbnail w-75"
                                src="{{ asset('storage/photosSantri/' . auth()->user()->santri->photo) }}"
                                alt="Foto Profil">
                        @else
                            <img class="img-thumbnail w-75" src="{{ asset('assets/img/avatar/avatar-3.png') }}"
                                alt="Foto Profil Default">
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Setelah redirect, tambahkan script untuk menampilkan SweetAlert -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = '{{ session('success') }}';

            if (successMessage) {
                Swal.fire({
                    title: 'Sukses!',
                    text: successMessage,
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            }
        });
    </script>
@endsection
