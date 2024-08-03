<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Imunisasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            color: black;
            /* background-color: #f4f4f4; */
        }

        header {
            /* background-color: #4CAF50; */
            /* color: white; */
            text-align: center;
            border-bottom: 4px solid #388E3C;
        }

        .header-content {
            padding: 0;
        }

        /* header h1,
        header h2 {
            margin: 0.5em 0;
        } */

        main {
            padding: 2em;
            margin: 0 auto;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 2px;
            /* Sesuaikan dengan kebutuhan Anda */
            border: 1px solid #000;
            /* Atur border sesuai kebutuhan */
            white-space: nowrap;
            font-size: 10px;
        }

        thead {
            background-color: #f2f2f2;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        .total-row td {
            background-color: yellow;
            /* Warna latar belakang kuning untuk baris total */
            font-weight: bold;
        }

        footer {
            /* background-color: #4CAF50; */
            /* color: white; */
            text-align: center;
            /* padding: 1.5em 0; */
            border-top: 4px solid #388E3C;
            /* justify-content: center; */
            width: 100%;
            bottom: 0;
        }
    </style>
</head>

<body>
    <header>
        <div class="header-content">
            <h1>Puskesmas Pembantu Sumber Mulyorejo Binjai</h1>
            <h2>Laporan Data Imunisasi</h2>
            <p>Periode:
                @if ($bulan_awal == null || $bulan_awal == 0)
                    {{ now()->year }}
                @else
                {{ Carbon\Carbon::create()->month(intval($bulan_awal))->translatedFormat('F') . ' - ' . Carbon\Carbon::create()->month(intval($bulan_akhir))->translatedFormat('F') }}
                @endif
            </p>
        </div>
    </header>

    <main>
        <table>
            <thead>
                <tr>
                    <th rowspan="2">Bulan</th>
                    <th colspan="2">Sasaran</th>
                    @foreach ($vaksin as $vaccine)
                        <th colspan="2">{{ $vaccine->nama_vaksin }}</th>
                    @endforeach
                </tr>
                <tr>
                    <th>Lk</th>
                    <th>Pr</th>
                    @foreach ($vaksin as $vaccine)
                        <th>Lk</th>
                        <th>Pr</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($pasien_per_bulan as $data)
                    <tr>
                        <td>{{ $data['bulan'] }}</td>
                        <td>{{ $data['lk'] }}</td>
                        <td>{{ $data['pr'] }}</td>
                        @foreach ($vaksin as $vaccine)
                            @php
                                // Cari data vaksin yang sesuai dengan bulan dan jenis kelamin
                                $data_vaksin = collect($data['jumlah_pemberian_vaksin'])
                                    ->where('nama_vaksin', $vaccine->nama_vaksin)
                                    ->first();
                            @endphp
                            <td>{{ $data_vaksin['jumlah_laki_laki'] ?? 0 }}</td>
                            <td>{{ $data_vaksin['jumlah_perempuan'] ?? 0 }}</td>
                        @endforeach
                    </tr>
                @endforeach
                <tr class="total-row">
                    <td>Total</td>
                    <td>{{ $total_sasaran_lk }}</td>
                    <td>{{ $total_sasaran_pr }}</td>
                    @foreach ($vaksin as $vaccine)
                        @php
                            // Hitung total untuk setiap jenis vaksin
                            $total_lk_vaksin = collect($pasien_per_bulan)->sum(function ($item) use ($vaccine) {
                                $data_vaksin = collect($item['jumlah_pemberian_vaksin'])
                                    ->where('nama_vaksin', $vaccine->nama_vaksin)
                                    ->first();
                                return $data_vaksin['jumlah_laki_laki'] ?? 0;
                            });

                            $total_pr_vaksin = collect($pasien_per_bulan)->sum(function ($item) use ($vaccine) {
                                $data_vaksin = collect($item['jumlah_pemberian_vaksin'])
                                    ->where('nama_vaksin', $vaccine->nama_vaksin)
                                    ->first();
                                return $data_vaksin['jumlah_perempuan'] ?? 0;
                            });
                        @endphp
                        <td>{{ $total_lk_vaksin }}</td>
                        <td>{{ $total_pr_vaksin }}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 Puskesmas Pembantu Sumber Mulyorejo Binjai</p>
    </footer>
</body>

</html>
