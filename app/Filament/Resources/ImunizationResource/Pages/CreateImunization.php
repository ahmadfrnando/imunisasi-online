<?php

namespace App\Filament\Resources\ImunizationResource\Pages;

use App\Filament\Resources\ImunizationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateImunization extends CreateRecord
{
    protected static string $resource = ImunizationResource::class;

    protected static ?string $title = 'Buat Data Vaksin';
}