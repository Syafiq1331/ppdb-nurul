@extends('layouts.admin', ['title' => 'Soal Pertanyaan'])

@section('content')
    <div class="container">
        <div class="d-flex justify-content-end mb-2">
            <a href="{{ route('pertanyaan.create') }}" class="btn btn-primary">Add Soal Pertanyaan</a>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Soal Pertanyaan</h6>
            </div>
            <div class="card-body">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori Soal Ujian</th>
                            <th>Text Pertanyaan</th>
                            <th>Jenjang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $question)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $question->exam->exam_name }}</td>
                                <td>{{ $question->question_text }}</td>
                                <td>{{ $question->jenjang->name }}</td>
                                <td>
                                    <a href="{{ route('pertanyaan.edit', $question->id) }}" class="btn btn-warning">Edit</a>
                                    {{-- Tambahkan tombol delete --}}
                                    <form action="{{ route('pertanyaan.destroy', $question->id) }}" method="POST"
                                        style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this question?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Setelah redirect, tambahkan script untuk menampilkan SweetAlert -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const errorMessage = '{{ session('error') }}';

            if (errorMessage) {
                Swal.fire({
                    title: 'error!',
                    text: error,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    </script>
@endsection
