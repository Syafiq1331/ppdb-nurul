@extends('layouts.admin', ['title' => 'Kategori Soal'])

@section('content')
    <div class="container">
        <h2>Tambah Kategori Soal</h2>
        <form action="{{ route('kategori-pertanyaan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exam_name">Nama Kategori Soal :</label>
                <input type="text" class="form-control" id="exam_name" name="exam_name" required>
            </div>
            <div class="form-group">
                <label for="jenjang_id">Jenjang Pendidikan : </label>
                <select name="jenjang_id" id="jenjang_id" class="form-control">
                    @foreach ($jenjang as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection
