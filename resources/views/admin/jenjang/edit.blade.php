<!-- resources/views/admin/jenjang/editJenjang.blade.php -->

@extends('layouts.admin', ['title' => 'Edit Jenjang'])

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Jenjang</h1>

        <!-- Form Edit akan ditampilkan di sini -->
        <form action="{{ route('jenjang.update', $jenjang->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama Jenjang:</label>
                <input type="text" name="name" class="form-control" value="{{ $jenjang->name }}" required>
            </div>

            <div class="form-group">
                <label for="kuota">Kuota:</label>
                <input type="number" name="kuota" class="form-control" value="{{ $jenjang->kuota }}" required>
            </div>

            <!-- Tambahkan input untuk atribut lainnya sesuai kebutuhan -->

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
