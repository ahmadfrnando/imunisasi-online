<?php

namespace App\Filament\Widgets;

use App\Models\Patient;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class PasienChart extends ChartWidget
{
    protected static ?string $heading = 'Pasien';
    protected static ?string $pollingInterval = '10s';

    protected static string $color = 'info';


    protected function getData(): array
    {
        $data = Trend::model(Patient::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();
        return [
            'datasets' => [
                [
                    'label' => 'Surat Keluar',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}