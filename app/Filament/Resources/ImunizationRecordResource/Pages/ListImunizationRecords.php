<?php

namespace App\Filament\Resources\ImunizationRecordResource\Pages;

use Filament\Actions;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ImunizationRecordResource;
use Filament\Forms\Components\Select;

class ListImunizationRecords extends ListRecords
{
    protected static string $resource = ImunizationRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label(__('Buat Imunisasi Baru'))->icon('heroicon-c-plus-circle'),
            Actions\Action::make('laporan_keseluruhan')
                ->icon('heroicon-s-printer')
                ->color('danger')
                ->url(
                    fn (): string => route('laporan'),
                    shouldOpenInNewTab: true
                ),
            Actions\Action::make('laporan_periode')
                ->color('success')
                ->icon('heroicon-s-printer')
                ->form([
                    Select::make('bulan_mulai')->options([
                        1 => 'Januari',
                        2 => 'Februari',
                        3 => 'Maret',
                        4 => 'April',
                        5 => 'Mei',
                        6 => 'Juni',
                        7 => 'Juli',
                        8 => 'Agustus',
                        9 => 'September',
                        10 => 'Oktober',
                        11 => 'November',
                        12 => 'Desember',
                    ]),
                    Select::make('bulan_akhir')->options([
                        1 => 'Januari',
                        2 => 'Februari',
                        3 => 'Maret',
                        4 => 'April',
                        5 => 'Mei',
                        6 => 'Juni',
                        7 => 'Juli',
                        8 => 'Agustus',
                        9 => 'September',
                        10 => 'Oktober',
                        11 => 'November',
                        12 => 'Desember',
                    ])
                ])
                ->action(function (array $data) {
                    // Eksekusi logika setelah form disubmit
                    $bulanMulai = $data['bulan_mulai'];
                    $bulanAkhir = $data['bulan_akhir'];
                    // Redirect ke route yang ditentukan dengan parameter tanggal
                    return redirect()->route('cetak.laporan-berjangka', [
                        'bulan_mulai' => $bulanMulai,
                        'bulan_akhir' => $bulanAkhir,
                    ]);
                })
        ];
    }
}