@extends('layouts.admin', ['title' => 'Jawaban'])

@section('content')
    <div class="container">
        <form action="{{ route('jawaban.update', $choice->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="question_id">Kategori Pertanyaan :</label>
                <select name="question_id" id="question_id" class="form-control">
                    @foreach ($questions as $question)
                        <option value="{{ $question->id }}" {{ $question->id == $choice->question_id ? 'selected' : '' }}>
                            {{ $question->question_text }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="choice_text">Jawaban :</label>
                <textarea name="choice_text" id="choice_text" class="form-control" rows="4" required>{{ $choice->choice_text }}</textarea>
            </div>
            <div class="form-group">
                <label for="is_correct">Jawaban benar atau salah :</label>
                <select name="is_correct" id="is_correct" class="form-control" required>
                    <option value="1" {{ $choice->is_correct ? 'selected' : '' }}>Benar</option>
                    <option value="0" {{ !$choice->is_correct ? 'selected' : '' }}>Salah</option>
                </select>
            </div>
            {{-- Tambahkan input dan validasi sesuai kebutuhan --}}
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
