@extends('layouts.admin', ['title' => 'Profile Wali Calon Santri'])

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profile Wali Santri Calon Calon Santri</h1>
        </div>
        <div class="row">

            <div class="d-flex justify-content-end w-100">
                <a href="{{ '/user/profile-wali-santri/' . auth()->user()->santri->waliSantri->id . '/edit' }}">
                    <button class="btn btn-primary mb-2">
                        <i class="fas fa-fw fa-edit pr-2"></i>
                        Edit Data
                    </button>
                </a>
            </div>

            <div class="w-100 card">
                <div class="row card-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Ayah : </label>
                                    <input type="text" class="form-control form-control-user" readonly
                                        value="{{ $waliSantri->nama_ayah }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Ibu : </label>
                                    <input type="text" class="form-control form-control-user" readonly
                                        value="{{ $waliSantri->nama_ibu }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Pekerjaan Ayah : </label>
                                    <input type="text" class="form-control form-control-user" readonly
                                        value="{{ $waliSantri->pekerjaan_ayah }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Pekerjaan Ibu : </label>
                                    <input type="text" class="form-control form-control-user" readonly
                                        value="{{ $waliSantri->pekerjaan_ibu }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Alamat Orang Tua : </label>
                                    <input type="text" class="form-control form-control-user" readonly
                                        value="{{ $waliSantri->alamat }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">No Whatsapp : </label>
                                    <input type="text" class="form-control form-control-user" readonly
                                        value="{{ $waliSantri->no_whatsapp }}">
                                </div>
                            </div>
                        </div>
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
