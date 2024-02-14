@extends('layouts.admin', ['title' => 'Edit Pemberitahuan'])

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Pemberitahuan</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('pemberitahuan.update', $pemberitahuan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="text">Pemberitahuan Text</label>
                        <textarea class="form-control" id="text" name="text" rows="3" required>{{ $pemberitahuan->text }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="publish" {{ $pemberitahuan->status == 'publish' ? 'selected' : '' }}>Publish
                            </option>
                            <option value="draft" {{ $pemberitahuan->status == 'draft' ? 'selected' : '' }}>Draft</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Pemberitahuan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
