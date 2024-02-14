@extends('layouts.admin', ['title' => 'Edit Administasi Calon Santri'])

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Profile Wali Santri</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('administrasi.update', $administrasi->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="fc_akta_kelahiran">File Akta Kelahiran:</label>
                            <input type="file" class="form-control" name="fc_akta_kelahiran"
                                value="{{ $administrasi->fc_akta_kelahiran }}" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="fc_kartu_keluarga">File Kartu Keluarga:</label>
                            <input type="file" class="form-control" name="fc_kartu_keluarga"
                                value="{{ $administrasi->fc_kartu_keluarga }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="fc_ktp_ortu_walisantri">File KTP Ortu Walisantri:</label>
                            <input type="file" class="form-control" name="fc_ktp_ortu_walisantri"
                                value="{{ $administrasi->fc_ktp_ortu_walisantri }}" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="fc_surat_kematian">File Surat Kematian:</label>
                            <input type="file" class="form-control" name="fc_surat_kematian"
                                value="{{ $administrasi->fc_surat_kematian }}" required>
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="fc_sktm">File SKTM:</label>
                            <input type="file" class="form-control" name="fc_sktm" value="{{ $administrasi->fc_sktm }}"
                                required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="fc_surat_pindah">File Surat Pindah:</label>
                            <input type="file" class="form-control" name="fc_surat_pindah"
                                value="{{ $administrasi->fc_surat_pindah }}" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>

            </div>
        </div>
    </div>
@endsection
