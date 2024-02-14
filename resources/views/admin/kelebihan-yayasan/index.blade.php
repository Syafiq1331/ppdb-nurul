@extends('layouts.admin', ['title' => 'Daftar Kelebihan Yayasan'])

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Icon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kelebihans as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->desc }}</td>
                                    <td>
                                        <box-icon name={{ $item->icon }} type="solid" color="black"
                                            size="md"></box-icon>
                                    </td>
                                    <td class="py-2">
                                        <a href="{{ route('kelebihan-yayasan.edit', $item->id) }}"
                                            class="btn btn-info mb-2 btn-sm">Edit</a>
                                        <form action="{{ route('kelebihan-yayasan.destroy', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        Data tidak ada
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- Tampilkan paginasi dengan styling Bootstrap 4 -->
                    {{ $kelebihans->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
