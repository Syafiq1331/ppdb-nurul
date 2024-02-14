@extends('layouts.admin', ['title' => 'User'])

@section('content')
    <div class="container">
        <h1>Hasil Ujian</h1>
        <p>Ujian: {{ $result->exam->exam_name }}</p>
        <p>Waktu Pengerjaan: {{ $result->duration }} menit</p>
        <p>Selamat anda naik masuk ke kelas : <strong> {{ $class }}</strong></p>

        <a href="{{ route('show-result', ['resultId' => $result->id, 'download_pdf' => true]) }}" class="btn btn-info">
            <i class="fa fa-download"></i> Download Report Ujian
        </a>
    </div>
@endsection
