@extends('layouts.admin', ['title' => 'Contact Yayasan Website'])

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Alamat</th>
                                <th>No Whatsapp</th>
                                <th>Email</th>
                                <th>Jam Operasi</th>
                                <th>Alamat Gmaps</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $contacts->alamat }}</td>
                                <td>{{ $contacts->no_whatsapp }}</td>
                                <td>{{ $contacts->email }}</td>
                                <td>{{ $contacts->jam_operasi }}</td>
                                <td>{{ $contacts->alamat_gmaps }}</td>
                                <td class="py-2">
                                    <a href="{{ route('contact.edit', $contacts->id) }}"
                                        class="btn btn-info mb-2 btn-sm">Edit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Tampilkan paginasi dengan styling Bootstrap 4 -->
                    {{-- {{ $contacts->links('pagination::bootstrap-5') }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
