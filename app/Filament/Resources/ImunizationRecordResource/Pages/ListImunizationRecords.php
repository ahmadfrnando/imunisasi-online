<?php

namespace App\Filament\Resources\ImunizationRecordResource\Pages;

use App\Filament\Resources\ImunizationRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListImunizationRecords extends ListRecords
{
    protected static string $resource = ImunizationRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->hidden(fn () => auth()->user()->role=='petugas_pendaftaran'),
            Actions\Action::make('Reports')
            ->icon('heroicon-s-printer')
            ->color('info')
            ->url(
                fn (): string => route('laporan'),
                shouldOpenInNewTab: true
            )
            ->hidden(fn () => auth()->user()->role=='petugas_pendaftaran'),
        ];
    }
}