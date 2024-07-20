<?php

namespace App\Filament\Resources\ImunizationResource\Pages;

use App\Filament\Resources\ImunizationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListImunizations extends ListRecords
{
    protected static string $resource = ImunizationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->hidden(fn () => auth()->user()->role=='petugas_pendaftaran'),
        ];
    }
}