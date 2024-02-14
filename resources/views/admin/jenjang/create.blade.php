@extends('layouts.admin', ['title' => 'Tambah Jenjang'])

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Tambah Jenjang</h1>

        <form action="{{ route('jenjang.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama Jenjang:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="kuota">Kuota:</label>
                <input type="number" name="kuota" class="form-control" required>
            </div>

            <!-- Tambahkan input untuk atribut lainnya sesuai kebutuhan -->

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
