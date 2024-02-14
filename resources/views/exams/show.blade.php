@extends('layouts.admin', ['title' => 'User'])

@section('content')
    <div class="container-fluid">
        <h1>Detail Ujian: {{ $exam->exam_name }}</h1>

        <h2>Pertanyaan:</h2>
        @foreach ($exam->questions as $question)
            <p>{{ $question->question_text }}</p>
            <ul>
                @foreach ($question->choices as $choice)
                    <li>{{ $choice->choice_text }} ({{ $choice->is_correct ? 'Benar' : 'Salah' }})</li>
                @endforeach
            </ul>
        @endforeach
    </div>
@endsection
