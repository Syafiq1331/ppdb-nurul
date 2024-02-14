@extends('layouts.admin', ['title' => 'List Santri'])

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-end align-items-end">
            <form id="downloadReportForm" action="{{ url('/admin/list-santri/generate-report') }}" method="get"
                class="row mb-2">
                <div class="col-md-6">
                    <label for="jenjangSelect">Pilih Jenjang:</label>
                    <select name="jenjang_id" id="jenjangSelect" class="form-control">
                        @foreach ($jenjang as $j)
                            <option value="{{ $j->id }}">{{ $j->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="button" class="btn btn-info col-md-6 mb-1 align-self-end" onclick="downloadReport()">Download
                    Report
                    PDF</button>
            </form>
        </div>

        <script>
            function downloadReport() {
                // Mendapatkan nilai jenjang yang dipilih
                var selectedJenjang = document.getElementById('jenjangSelect').value;

                // Set nilai input jenjang pada formulir
                document.getElementById('downloadReportForm').elements['jenjang_id'].value = selectedJenjang;

                // Submit formulir
                document.getElementById('downloadReportForm').submit();
            }
        </script>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Jenjang yang di pilih</th>
                                <th>TTL</th>
                                <th>Photo</th>
                                <th>Asal Sekolah</th>
                                <th>Bukti pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($santri as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_lengkap }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->jenjang->name }}</td>
                                    <td>{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}</td>
                                    <td class="w-25">
                                        <div class="d-flex align-items-center justify-content-center">
                                            @if ($item->photo)
                                                <img class="w-50 img-thumbnail"
                                                    src="{{ asset('storage/photosSantri/' . $item->photo) }}"
                                                    alt="Foto Profil">
                                            @else
                                                <p>Santri belum upload photo diri.</p>
                                            @endif
                                        </div>
                                    </td>

                                    <td>{{ $item->asal_sekolah }}</td>
                                    <td class="w-25">
                                        <div class="d-flex align-items-center justify-content-center">
                                            @if ($item->bukti_pembayaran)
                                                <img class="w-50 img-thumbnail"
                                                    src="{{ asset('storage/buktiTransfer/' . $item->bukti_pembayaran) }}"
                                                    alt="Foto Profil">
                                            @else
                                                <p>Santri belum upload photo diri.</p>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
