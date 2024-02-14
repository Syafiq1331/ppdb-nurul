@extends('layouts.admin', ['title' => 'Jenjang'])

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-end mb-2">
            <!-- Tambahkan button untuk membuka modal -->
            <a href="/admin/jenjang/create">
                <button type="button" class="btn btn-primary">
                    Tambah Jenjang
                </button>
            </a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Jenjang & Kuota Peserta Didik</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama Jenjang</th>
                                <th>Kuota Santri</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jenjang as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->kuota }}</td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        {{-- <button class="btn btn-primary btn-sm btn-edit" data-id="{{ $item->id }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button> --}}
                                        <a href="{{ route('jenjang.edit', $item->id) }}">
                                            <button class="btn btn-primary btn-sm btn-edit">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="confirmDelete('{{ $item->id }}')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        // Edit & Update function
        $(document).ready(function() {
            // Tangkap klik tombol Edit
            $('.btn-edit').click(function() {
                // Ambil data-id
                var jenjangId = $(this).data('id');

                // Kirim AJAX request untuk mengambil data edit
                $.ajax({
                    url: '/admin/jenjang/' + jenjangId + '/edit',
                    method: 'GET',
                    success: function(data) {
                        // Tampilkan form edit di dalam modal
                        $('#editModal .modal-body').html(data);
                        $('#editModal').modal('show');
                    },
                    error: function() {
                        alert('Gagal mengambil data edit.');
                    }
                });
            });
        });

        // Delete sweetalert
        function confirmDelete(itemId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Anda tidak dapat mengembalikan data yang sudah dihapus!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Menggunakan fetch untuk menghapus data
                    fetch("{{ url('/admin/jenjang') }}/" + itemId, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content'),
                                'Content-Type': 'application/json',
                            },
                        })
                        .then((response) => response.json())
                        .then((data) => {
                            // Handle respons dari server
                            if (data.success) {
                                // Berhasil dihapus, tambahkan pesan sukses atau aksi lainnya
                                Swal.fire('Berhasil!', 'Data Jenjang berhasil dihapus.', 'success');
                                // Tambahan: Refresh halaman atau perbarui daftar Jenjang
                                location.reload();
                            } else {
                                // Gagal menghapus, tambahkan pesan error atau aksi lainnya
                                Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus data.', 'error');
                            }
                        })
                        .catch((error) => {
                            // Tangani error jika ada
                            console.error('Error:', error);
                            Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus data.', 'error');
                        });
                }
            });
        }
    </script>
@endsection
