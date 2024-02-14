@extends('layouts.admin', ['title' => 'Dashboard'])

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        @if (auth()->check() && auth()->user()->role === 'user')
            @if ($pemberitahuan && $pemberitahuan->text)
                <marquee class="text-danger">
                    {{ $pemberitahuan->text }}
                </marquee>
            @endif
        @endif
        <div class="d-sm-flex align-items-center justify-content-between mb-4">

            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>
        <div class="row">
            @if (auth()->check() && (auth()->user()->role === 'admin' || auth()->user()->role === 'superadmin'))
                <div class="col-md-12 row">

                    <div class="col-md-4 ">
                        <div class="card border-left-primary shadow py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Siswa sudah bayar
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{-- {{ $santriBayar }} Orang Santri --}}
                                            @if ($santriBayar !== 0 || null)
                                                {{ $santriBayar }} Orang Siswa
                                            @else
                                                Belum ada
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card border-left-primary shadow py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Siswa belum bayar
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $santriBelumBayar }} Orang
                                            Siswa
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card border-left-primary shadow py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Jumlah Siswa yang daftar
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $santriTotal }} Orang Siswa
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>

                <div class="row col-md-12">
                    <div class="col-md-6 mb-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Jumlah Siswa Daftar Per Jenjang</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="jenjangChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Jumlah Siswa Per Jenis Kelamin</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="genderChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (auth()->check() && auth()->user()->role === 'user')
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
                                            value="{{ auth()->user()->santri->nama_lengkap ? auth()->user()->santri->nama_lengkap : 'Data Belum diisi' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Kelas yang diterima : </label>
                                        <input type="text" class="form-control form-control-user" readonly
                                            value="{{ auth()->user()->santri->score ? auth()->user()->santri->score : 'Data Belum diisi' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Jenis Kelamin : </label>
                                        <input type="text" class="form-control form-control-user" readonly
                                            value="{{ auth()->user()->santri->jenis_kelamin ? auth()->user()->santri->jenis_kelamin : 'Data Belum diisi' }}">
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
                        </div>
                        <div class="col-md-4 w-100">
                            <label>Foto Siswa</label>
                            <br>
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
            @endif

        </div>
    </div>
    <!-- Include the SweetAlert2 CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = '{{ session('warning') }}';

            if (successMessage) {
                Swal.fire({
                    title: 'Peringatan!',
                    text: successMessage,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('jenjangChart').getContext('2d');
            var data = @json($jumlahPerJenjang);

            var labels = data.map(function(item) {
                return item.jenjang_name;
            });

            var values = data.map(function(item) {
                return item.total_santri;
            });

            var chart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: values,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(54, 162, 235, 0.8)',
                            'rgba(255, 206, 86, 0.8)',
                            'rgba(75, 192, 192, 0.8)',
                            'rgba(153, 102, 255, 0.8)',
                            'rgba(255, 159, 64, 0.8)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('genderChart').getContext('2d');
            var genderData = @json($jumlahPerGender);

            var labelsGender = genderData.map(function(item) {
                return item.jenis_kelamin; // Menggunakan kolom jenis_kelamin dari hasil query
            });

            var valuesGender = genderData.map(function(item) {
                return item.total_santri;
            });

            var chart = new Chart(ctx, {
                type: 'bar', // Menggunakan bar chart karena lebih cocok untuk menampilkan jumlah
                data: {
                    labels: labelsGender,
                    datasets: [{
                        label: 'Jumlah Siswa',
                        data: valuesGender,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(54, 162, 235, 0.8)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

@endsection
