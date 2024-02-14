<!-- resources/views/user/Pembayaran/pdf.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa yang telah daftar</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h1>Daftar Siswa yang telah daftar</h1>

    <table>
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Jenjang yang di pilih</th>
                <th>TTL</th>
                <th>Asal Sekolah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->jenjang->name }}</td>
                    <td>{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}</td>
                    <td>{{ $item->asal_sekolah }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
