@extends('layouts.admin', ['title' => 'Pembayaran Calon siswa'])

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pembayaran Biaya Pendaftaran Calon siswa</h1>
        </div>
        <div class="row">

            <div class="w-100 card">
                <div class="row card-body">
                    <div class="col-md-6">
                        <div class="card mt-3">
                            <div class="card-body">
                                <h5 class="card-title">Status Pembayaran Biaya Pendaftaran</h5>
                                @if ($santri->status_bayar == 'Belum Bayar')
                                    <p class="card-text text-danger">Menunggu ACC admin</p>
                                @else
                                    <p class="card-text text-success">Sudah membayar</p>
                                @endif

                                <hr>

                                <p class="text-center"><strong>Foto Bukti Transfer</strong></p>
                                @if ($santri->bukti_pembayaran == null)
                                    <p class="card-text text-danger text-center">Foto Belum Tersedia</p>
                                @else
                                    <div class="d-flex justify-content-center">
                                        <img class="w-50 img-thumbnail"
                                            src="{{ asset('storage/buktiTransfer/' . $santri->bukti_pembayaran) }}"
                                            alt="Bukti Pembayaran">
                                    </div>
                                @endif


                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mt-3">
                            <div class="card-body">
                                <h5 class="card-title">Form Upload Bukti Pembayaran</h5>
                                <form id="uploadForm" action="{{ url('user/pembayaran') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="bukti_pembayaran">Pilih Gambar Bukti Pembayaran:</label>
                                        <input type="file" class="form-control-file" id="bukti_pembayaran"
                                            name="bukti_pembayaran" accept="image/*" required>
                                    </div>
                                    <div class="form-group">
                                        <img id="previewImage" class="img-fluid w-50" style="display: none;"
                                            alt="Preview Image">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </div>

                            <script>
                                document.getElementById('bukti_pembayaran').addEventListener('change', function(e) {
                                    const previewImage = document.getElementById('previewImage');
                                    const fileInput = e.target;
                                    const file = fileInput.files[0];

                                    if (file) {
                                        const reader = new FileReader();

                                        reader.onload = function(e) {
                                            previewImage.src = e.target.result;
                                            previewImage.style.display = 'block';
                                        };

                                        reader.readAsDataURL(file);
                                    } else {
                                        previewImage.style.display = 'none';
                                    }
                                });
                            </script>

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
