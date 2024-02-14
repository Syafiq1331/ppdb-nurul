<!-- edit.blade.php -->

@extends('layouts.admin', ['title' => 'Edit Vision & Mission'])

@section('content')
    <div class="container-fluid">
        <h1>Edit Vision & Mission</h1>
        <form action="{{ route('visi-misi.update', $visiMisi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="visi">Visi:</label>
            <textarea name="visi" id="visi" cols="30" rows="5" class="form-control" required>{{ $visiMisi->visi }}</textarea>

            <label for="misi">Misi:</label>
            <textarea name="misi" id="misi" cols="30" rows="5" class="form-control" required>{{ $visiMisi->misi }}</textarea>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
@endsection
