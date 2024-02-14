<!-- resources/views/admin/profile-guru/create.blade.php -->

@extends('layouts.admin', ['title' => 'Create Profile Guru'])

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('list-guru.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_depan" class="form-label">Nama Depan:</label>
                                <input type="text" class="form-control" id="nama_depan" name="nama_depan" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama_belakang" class="form-label">Nama Belakang:</label>
                                <input type="text" class="form-control" id="nama_belakang" name="nama_belakang">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                            </div>

                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat:</label>
                                <textarea class="form-control" id="alamat" name="alamat"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nomor_whatsapp" class="form-label">Nomor WhatsApp:</label>
                                <input type="text" class="form-control" id="nomor_whatsapp" name="nomor_whatsapp">
                            </div>

                            <div class="mb-3">
                                <label for="posisi_pekerjaan" class="form-label">Posisi Pekerjaan:</label>
                                <input type="text" class="form-control" id="posisi_pekerjaan" name="posisi_pekerjaan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="foto_profil" class="form-label">Foto Profil:</label>
                                <input type="file" class="form-control" id="foto_profil" name="foto_profil"
                                    onchange="previewImage(this)">
                                <img id="preview" class="img-fluid mt-2" style="max-width: 200px; display: none;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi:</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input) {
            var preview = document.getElementById('preview');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
                preview.style.display = 'block';
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }
    </script>
@endsection
