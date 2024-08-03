<?php
use Carbon\Carbon;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Imunisasi Balita</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #eef2f7;
        }

        .report-container {
            width: 90%;
            margin: 30px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 2.5em;
        }

        .puskesmas-info,
        .child-info,
        .immunization-history {
            margin-bottom: 30px;
        }

        h2 {
            color: #2980b9;
            border-bottom: 3px solid #3498db;
            padding-bottom: 8px;
            font-size: 1.8em;
            margin-bottom: 20px;
        }

        p {
            margin: 8px 0;
            color: #34495e;
            font-size: 1.1em;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 1em;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #2980b9;
            color: #fff;
            font-size: 1.1em;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #d1ecf1;
        }

        @media (max-width: 768px) {
            .report-container {
                width: 95%;
                padding: 20px;
            }

            h1 {
                font-size: 2em;
            }

            h2 {
                font-size: 1.5em;
            }

            p,
            table,
            th,
            td {
                font-size: 0.9em;
            }
        }
    </style>
</head>

<body>
    <div class="report-container">
        <h1>Laporan Imunisasi Balita</h1>
        <div class="puskesmas-info">
            <p>Puskesmas Pembantu Sumber Mulyorejo Binjai</p>
            <p>Alamat: Jl. Dr. Wahidin No.24</p>
        </div>
        <div class="child-info">
            <h2>Data Balita</h2>
            <p><strong>Nama Balita:</strong> {{ $patient->nama_balita }}</p>
            <p><strong>Tanggal Lahir:</strong>{{ $patient->tanggal_lahir }}</p>
            <p><strong>Jenis Kelamin:</strong> {{ $patient->jenis_kelamin }}</p>
            <p><strong>Nama Orang Tua / Wali:</strong> {{ $patient->nama_wali }}</p>
            <p><strong>No HP:</strong>{{ $patient->telepon_wali}}</p>
            <p><strong>Tinggi Badan Lahir:</strong> {{ $patient->tinggi_badan_lahir }} cm</p>
            <p><strong>Berat Badan Lahir:</strong> {{ $patient->berat_badan_lahir }} kg</p>
            <p><strong>Lingkar Kepala Lahir:</strong> {{ $patient->lingkar_kepala }} cm</p>
        </div>
        <div class="immunization-history">
            <h2>Riwayat Imunisasi</h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Imunisasi</th>
                        <th>Tanggal Imunisasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($immunizationRecords as $record)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $record->nama_vaksin }}</td>
                            <td>{{ Carbon::parse($record->created_at)->format('d-m-Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
