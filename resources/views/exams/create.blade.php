@extends('layouts.admin', ['title' => 'User'])

@section('content')
    <div class="container-fluid">
        <h1>Tambah Pertanyaan dan Jawaban</h1>

        <form method="post" action="{{ route('questions.store') }}">
            @csrf

            <label for="exam_id">Pilih Ujian:</label>
            <select name="exam_id" id="exam_id">
                @foreach ($exams as $exam)
                    <option value="{{ $exam->id }}">{{ $exam->exam_name }}</option>
                @endforeach
            </select>

            <div>
                <label for="question_text">Pertanyaan:</label>
                <textarea name="question_text" id="question_text" rows="3"></textarea>
            </div>

            <div>
                <label for="choices">Pilihan Jawaban:</label>
                <div id="choices">
                    <div>
                        <input type="text" name="choices[0][choice_text]" placeholder="Pilihan Jawaban 1" required>
                        <label for="choices[0][is_correct]">Benar</label>
                        <input type="radio" name="choices[0][is_correct]" value="1" required>
                    </div>
                    <div>
                        <input type="text" name="choices[1][choice_text]" placeholder="Pilihan Jawaban 2" required>
                        <label for="choices[1][is_correct]">Benar</label>
                        <input type="radio" name="choices[1][is_correct]" value="1" required>
                    </div>
                    <!-- Tambahkan pilihan jawaban lainnya sesuai kebutuhan -->
                </div>
            </div>

            <button type="submit">Simpan Pertanyaan dan Jawaban</button>
        </form>
    </div>
@endsection
