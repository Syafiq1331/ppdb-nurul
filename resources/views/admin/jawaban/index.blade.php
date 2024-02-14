@extends('layouts.admin', ['title' => 'Jawaban'])

@section('content')
    <div class="container">
        <div class="d-flex justify-content-end">
            <a href="{{ route('jawaban.create') }}" class="btn btn-primary">Tambah Jawaban</a>
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pertanyaan</th>
                    <th>Jawaban Pertanyaan</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($choices as $choice)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $choice->question->question_text }}</td>
                        <td>{{ $choice->choice_text }}</td>
                        <td>{{ $choice->is_correct ? 'Benar' : 'Salah' }}</td>
                        <td>
                            <a href="{{ route('jawaban.edit', $choice->id) }}" class="btn btn-warning">Edit</a>
                            {{-- Tambahkan tombol delete --}}
                            <form action="{{ route('jawaban.destroy', $choice->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this choice?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
