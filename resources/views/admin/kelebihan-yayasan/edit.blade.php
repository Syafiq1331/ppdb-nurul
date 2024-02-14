@extends('layouts.admin', ['title' => 'Daftar Kelebihan Yayasan'])

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('kelebihan-yayasan.update', $kelebihan->id) }}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $kelebihan->title }}">
                </div>

                <div class="mb-3 col-md-6">
                    <label for="desc" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="desc" name="desc" rows="3">{{ $kelebihan->desc }}</textarea>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="icon" class="form-label">Icon</label>
                    <input type="text" class="form-control" id="icon" name="icon" value="{{ $kelebihan->icon }}">
                </div>
            </div>

            <!-- Tambahkan input lain sesuai kebutuhan -->

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
