{{-- resources/views/questions/edit.blade.php --}}
@extends('layouts.admin', ['title' => 'Soal Pertanyaan'])

@section('content')
    <div class="container">
        <form action="{{ route('pertanyaan.update', $question->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exam_id">Kategori Pertanyaan :</label>
                <select name="exam_id" id="exam_id" class="form-control">
                    @foreach ($exams as $exam)
                        <option value="{{ $exam->id }}" {{ $exam->id == $question->exam_id ? 'selected' : '' }}>
                            {{ $exam->exam_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="jenjang_id">Jenjang :</label>
                <select name="jenjang_id" id="jenjang_id" class="form-control">
                    @foreach ($jenjang as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $question->item_id ? 'selected' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="question_text">Text Soal Pertanyaan :</label>
                <textarea name="question_text" id="question_text" class="form-control" rows="4" required>{{ $question->question_text }}</textarea>
            </div>
            {{-- Tambahkan input dan validasi sesuai kebutuhan --}}
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
