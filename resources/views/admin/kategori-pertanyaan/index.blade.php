@extends('layouts.admin', ['title' => 'Kategori Soal'])

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-end mb-2">
            <!-- Tambahkan button untuk membuka modal -->
            <a href="/admin/kategori-pertanyaan/create">
                <button type="button" class="btn btn-primary">
                    Tambah Kategori Soal
                </button>
            </a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Kategori Soal</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama Kategori</th>
                                <th>Jenjang</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($exams as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->exam_name }}</td>
                                    <td>{{ $item->jenjang->name }}</td>
                                    <td>
                                        <a href="{{ route('kategori-pertanyaan.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('kategori-pertanyaan.destroy', $item->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
