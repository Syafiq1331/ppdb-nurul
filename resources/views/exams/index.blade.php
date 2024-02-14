@extends('layouts.admin', ['title' => 'User'])

@section('content')
    <div class="container-fluid">
        <h1>Daftar Ujian</h1>

        <ul>
            @foreach ($exams as $exam)
                <li>
                    <a href="{{ route('exams.start', $exam->id) }}">{{ $exam->exam_name }}</a>

                </li>
            @endforeach
        </ul>
    </div>
@endsection
