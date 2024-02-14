@extends('layouts.admin', ['title' => 'Soal Pertanyaan'])

@section('content')
    <div class="container">
        {{-- <div class="d-flex justify-content-end mb-2">
            <a href="{{ route('pemberitahuan.create') }}" class="btn btn-primary">Add Pemberitahuan</a>
        </div> --}}
        <div class="card shadow mb-4">
            <div class="card-body">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>Pemberitahuan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>{{ $pemberitahuan->text }}</td>
                        <td>{{ $pemberitahuan->status }}</td>
                        <td>
                            @if ($pemberitahuan->status == 'publish')
                                <form action="{{ route('pemberitahuan.updateStatus', $pemberitahuan->id) }}" method="POST"
                                    style="display: inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="draft">
                                    <button type="submit" class="btn btn-success">Ubah Status Pemberitahuan</button>
                                </form>
                            @elseif ($pemberitahuan->status == 'draft')
                                <form action="{{ route('pemberitahuan.updateStatus', $pemberitahuan->id) }}" method="POST"
                                    style="display: inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="publish">
                                    <button type="submit" class="btn btn-success">Ubah Status Pemberitahuan</button>
                                </form>
                            @endif
                            <a href="{{ route('pemberitahuan.edit', $pemberitahuan->id) }}" class="btn btn-warning">Edit</a>
                        </td>

                        {{-- @foreach ($pemberitahuan as $item)
                            <tr>
                                <td>{{ $item->text }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    @if ($item->status == 'Belum Bayar')
                                        <form action="{{ route('administrasi.update', $santri->id) }}" method="POST"
                                            style="display: inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success">Ubah Status
                                                Bayar</button>
                                        </form>
                                    @else
                                        <input type="text" readonly class="form-control text-center text-white bg-info"
                                            value="Sudah bayar">
                                    @endif
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
