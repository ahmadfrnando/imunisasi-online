<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Patient;
use App\Models\Immunization;
use Illuminate\Http\Request;
use App\Models\ImmunizationRecord;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function cetak()
    {
        // Ambil semua data vaksin
        $vaksin = Immunization::all();

        // Mengambil jumlah pasien per bulannya
        $pasien_per_bulan = [];

        // Iterasi untuk setiap bulan
        for ($month = 1; $month <= 12; $month++) {
            $startDate = Carbon::create(2024, $month, 1)->startOfMonth();
            $endDate = Carbon::create(2024, $month, 1)->endOfMonth();

            // Hitung jumlah pasien laki-laki dan perempuan untuk bulan ini berdasarkan tanggal_pemberian
            $lk_count = ImmunizationRecord::where('tanggal_pemberian', '>=', $startDate)
                ->where('tanggal_pemberian', '<=', $endDate)
                ->whereHas('patient', function ($query) {
                    $query->where('jenis_kelamin', 'Laki-laki');
                })
                ->count();

            $pr_count = ImmunizationRecord::where('tanggal_pemberian', '>=', $startDate)
                ->where('tanggal_pemberian', '<=', $endDate)
                ->whereHas('patient', function ($query) {
                    $query->where('jenis_kelamin', 'Perempuan');
                })
                ->count();

            // Ambil data pemberian vaksin untuk bulan ini
            $data_pemberian_vaksin = ImmunizationRecord::whereMonth('tanggal_pemberian', $month)
                ->whereYear('tanggal_pemberian', 2024)
                ->with('patient', 'immunization')
                ->get();

            // Hitung jumlah pemberian vaksin untuk setiap jenis vaksin
            $jumlah_pemberian_vaksin = [];

            foreach ($vaksin as $vaccine) {
                // Filter data pemberian vaksin berdasarkan jenis vaksin dan jenis kelamin
                $jumlah_laki_laki = $data_pemberian_vaksin->filter(function ($record) use ($vaccine, $startDate, $endDate) {
                    return $record->immunization->nama_vaksin === $vaccine->nama_vaksin &&
                        $record->patient->jenis_kelamin === 'Laki-laki' &&
                        Carbon::parse($record->tanggal_pemberian)->between($startDate, $endDate);
                })->count();

                $jumlah_perempuan = $data_pemberian_vaksin->filter(function ($record) use ($vaccine, $startDate, $endDate) {
                    return $record->immunization->nama_vaksin === $vaccine->nama_vaksin &&
                        $record->patient->jenis_kelamin === 'Perempuan' &&
                        Carbon::parse($record->tanggal_pemberian)->between($startDate, $endDate);
                })->count();

                // Simpan hasil perhitungan ke dalam array
                $jumlah_pemberian_vaksin[] = [
                    'nama_vaksin' => $vaccine->nama_vaksin,
                    'jumlah_laki_laki' => $jumlah_laki_laki,
                    'jumlah_perempuan' => $jumlah_perempuan,
                ];
            }

            // Simpan data bulan ini ke dalam array $pasien_per_bulan
            $pasien_per_bulan[] = [
                'bulan' => $startDate->format('F'),
                'lk' => $lk_count,
                'pr' => $pr_count,
                'jumlah_pemberian_vaksin' => $jumlah_pemberian_vaksin,
            ];
        }
        $total_sasaran_lk = 0;
        $total_sasaran_pr = 0;

        foreach ($pasien_per_bulan as $data) {
            $total_sasaran_lk += $data['lk'];
            $total_sasaran_pr += $data['pr'];
        }

        // return view('laporanpdf', compact('pasien_per_bulan', 'vaksin', 'total_sasaran_lk', 'total_sasaran_pr'));
        $pdf = PDF::loadView('laporanpdf', compact('pasien_per_bulan', 'vaksin', 'total_sasaran_lk', 'total_sasaran_pr'))->setPaper('a4', 'landscape');
        return $pdf->stream('Laporan-Surat-Masuk.pdf');
    }
}