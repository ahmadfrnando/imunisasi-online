<?php

namespace App\Filament\Resources\ImunizationRecordResource\Pages;

use App\Filament\Resources\ImunizationRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditImunizationRecord extends EditRecord
{
    protected static string $resource = ImunizationRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
