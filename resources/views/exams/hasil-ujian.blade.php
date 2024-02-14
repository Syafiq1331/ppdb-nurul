<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        #app {
            padding: 20px;
        }

        .section {
            width: 100%;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        .card-body {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        .inner-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
            margin-top: 20px;
        }

        .inner-card-body {
            padding: 20px;
        }

        h3 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h1>Report Ujian Online</h1>
                    </div>
                    <div class="card-body">
                        <table>
                            <thead>
                                <tr>
                                    <th style="width: 150px;">Nama</th>
                                    <td>{{ $user->nama_lengkap }}</td>
                                </tr>
                                <tr>
                                    <th>No NISN</th>
                                    <td>{{ $user->nisn }}</td>
                                </tr>
                                <tr>
                                    <th>Mata Pelajaran</th>
                                    <td>{{ $result->exam->exam_name }}</td>
                                </tr>
                                <tr>
                                    <th>Kelas</th>
                                    <td>Kelas {{ $class }}</td>
                                </tr>
                            </thead>
                        </table>
                        <div class="inner-card">
                            <div class="inner-card-body">
                                <h3>Selamat, kamu keterima di kelas {{ $class }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
