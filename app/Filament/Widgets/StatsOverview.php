<?php

namespace App\Filament\Widgets;

use App\Models\Patient;
use App\Models\Measurement;
use App\Models\Immunization;
use App\Models\ImmunizationRecord;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
            return [
                Stat::make('Total Balita', Patient::count()),
                Stat::make('Total Pemberian Imunisasi', ImmunizationRecord::count()),
                Stat::make('Total Pengguna', User::count()),
                Stat::make('Total Vaksin Tersedia', Immunization::count()),
            ];
    }
}