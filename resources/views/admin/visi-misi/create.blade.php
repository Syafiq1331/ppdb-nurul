<!-- create.blade.php -->

@extends('layouts.admin', ['title' => 'Create Vision & Mission'])

@section('content')
    <div class="container-fluid">
        <h1>Create Vision & Mission</h1>
        <form action="{{ route('visi-misi.store') }}" method="POST">
            @csrf
            <label for="visi">Visi:</label>
            <textarea name="visi" id="visi" cols="30" rows="5" class="form-control" required></textarea>

            <label for="misi">Misi:</label>
            <textarea name="misi" id="misi" cols="30" rows="5" class="form-control" required></textarea>

            <button type="submit" class="btn btn-primary mt-3">Save</button>
        </form>
    </div>
@endsection
