<!-- index.blade.php -->

@extends('layouts.admin', ['title' => 'List Profile Guru'])

@section('content')
    <div class="container">
        <div class="d-flex justify-content-end mb-2">
            <!-- Tambahkan button untuk membuka modal -->
            <a href="/admin/list-guru/create">
                <button type="button" class="btn btn-primary">
                    Tambah Guru
                </button>
            </a>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama Lengkap</th>
                                <th>Alamat</th>
                                <th>No Whatsapp</th>
                                <th>Posisi Pekerjaan</th>
                                <th>Foto</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profileGurus as $profileGuru)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $profileGuru->nama_depan }} {{ $profileGuru->nama_belakang }}</td>
                                    <td>{{ $profileGuru->alamat }}</td>
                                    <td>{{ $profileGuru->nomor_whatsapp }}</td>
                                    <td>{{ $profileGuru->posisi_pekerjaan }}</td>
                                    <td>
                                        @if ($profileGuru->foto_profil)
                                            <img src="{{ asset('storage/' . $profileGuru->foto_profil) }}" alt="Foto Profil"
                                                class="img-fluid m-2 w-100">
                                        @else
                                            No Image
                                        @endif

                                    </td>


                                    <td class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('list-guru.edit', $profileGuru->id) }}"
                                            class="btn btn-primary btn-sm mx-1">Edit</a>
                                        <a href="{{ route('list-guru.show', $profileGuru->id) }}"
                                            class="btn btn-info btn-sm mx-1">Detail</a>
                                        <form action="{{ route('list-guru.destroy', $profileGuru->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm mx-1"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Tampilkan navigasi paginate dengan Bootstrap 5 -->
            <div class="d-flex px-4 py-2">
                {{ $profileGurus->links('pagination::bootstrap-5') }}
            </div>
        </div>

    </div>
@endsection
