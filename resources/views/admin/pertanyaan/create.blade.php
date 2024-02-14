@extends('layouts.admin', ['title' => 'Soal Pertanyaan'])

@section('content')
    <div class="container">
        <form action="{{ route('pertanyaan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exam_id">Kategori Soal : </label>
                <select name="exam_id" id="exam_id" class="form-control">
                    @foreach ($exams as $exam)
                        <option value="{{ $exam->id }}">{{ $exam->exam_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="jenjang_id">Jenjang Pendidikan : </label>
                <select name="jenjang_id" id="jenjang_id" class="form-control">
                    @foreach ($jenjang as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="question_text">Soal Pertanyaan :</label>
                <textarea name="question_text" id="question_text" class="form-control" rows="4" required></textarea>
            </div>
            {{-- Tambahkan input dan validasi sesuai kebutuhan --}}
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection
