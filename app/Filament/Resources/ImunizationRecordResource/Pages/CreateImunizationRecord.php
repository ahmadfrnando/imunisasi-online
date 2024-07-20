<?php

namespace App\Filament\Resources\ImunizationRecordResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ImunizationRecordResource;

class CreateImunizationRecord extends CreateRecord
{
    protected static string $resource = ImunizationRecordResource::class;

    protected static ?string $title = 'Daftar Imunisasi';

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['petugas_id'] = Auth::id();
        
        return $data;
    }
}