@extends('layouts.admin', ['title' => 'List Pembayaran Siswa'])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="w-100 card">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">List Pembayaran Siswa</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Status Bayar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($santris as $santri)
                                        <tr>
                                            <td>{{ $santri->id }}</td>
                                            <td>{{ $santri->nama_lengkap }}</td>
                                            <td>{{ $santri->bukti_pembayaran }}</td>
                                            <td>{{ $santri->status_bayar }}</td>
                                            <td>
                                                @if ($santri->status_bayar == 'Belum Bayar')
                                                    <form action="{{ route('administrasi.update', $santri->id) }}"
                                                        method="POST" style="display: inline">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-success">Ubah Status
                                                            Bayar</button>
                                                    </form>
                                                @else
                                                    <input type="text" readonly
                                                        class="form-control text-center text-white bg-info"
                                                        value="Sudah bayar">
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">Tidak ada data santri.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                                {{ $santris->links('pagination::bootstrap-4') }}
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
