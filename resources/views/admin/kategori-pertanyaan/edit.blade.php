@extends('layouts.admin', ['title' => 'Kategori Soal'])

@section('content')
    <div class="container">
        <h2>Edit Kategori Soal</h2>
        <form action="{{ route('kategori-pertanyaan.update', $exam->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exam_name">Nama Kategori Soal :</label>
                <input type="text" class="form-control" id="exam_name" name="exam_name" value="{{ $exam->exam_name }}"
                    required>
            </div>
            <div class="form-group">
                <label for="jenjang_id">Jenjang :</label>
                <select name="jenjang_id" id="jenjang_id" class="form-control">
                    @foreach ($jenjang as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $exam->item_id ? 'selected' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
