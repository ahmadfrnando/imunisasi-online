<?php

namespace App\Filament\Resources\MeasurementResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\MeasurementResource;

class CreateMeasurement extends CreateRecord
{
    protected static string $resource = MeasurementResource::class;

    protected static ?string $title = 'Buat Data Penimbangan dan Pengukuran';

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['petugas_id'] = Auth::id();
        
        return $data;
    }
}