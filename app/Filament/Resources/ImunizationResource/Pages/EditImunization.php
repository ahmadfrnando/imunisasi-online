<?php

namespace App\Filament\Resources\ImunizationResource\Pages;

use App\Filament\Resources\ImunizationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditImunization extends EditRecord
{
    protected static string $resource = ImunizationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
