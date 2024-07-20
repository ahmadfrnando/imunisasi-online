<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Patient;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Immunization;
use Filament\Resources\Resource;
use App\Models\ImmunizationRecord;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ImunizationRecordResource\Pages;
use App\Filament\Resources\ImunizationRecordResource\RelationManagers;

class ImunizationRecordResource extends Resource
{
    protected static ?string $model = ImmunizationRecord::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Pemberian Imunisasi';

    

    public static function getPluralLabel(): ?string
    {
        $locale = app()->getLocale();
        if ($locale == 'id') {
            return "Daftar Pemberian Imunisasi";
        } else
            return "Daftar Pemberian Imunisasi";
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('patient_id')->label('Nama Pasien')
                    ->options(Patient::all()->pluck('nama_balita', 'patient_id'))
                    ->searchable()->required(),
                Select::make('immunization_id')->label('Imunisasi')
                    ->options(Immunization::all()->pluck('nama_vaksin', 'immunization_id'))
                    ->searchable()->required(),
                DatePicker::make('tanggal_pemberian')->label('Tanggal Pemberian')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('patient.nama_balita')->label('Nama balita')->searchable(),
                TextColumn::make('immunization.nama_vaksin')->label('Jenis Vaksin')->searchable(),
                TextColumn::make('tanggal_pemberian')->searchable(),
                TextColumn::make('petugas.name')->label('Dibuat Oleh')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make('view')->hidden(fn () => auth()->user()->role=='petugas_pendaftaran'),
                Tables\Actions\EditAction::make()->hidden(fn () => auth()->user()->role=='petugas_pendaftaran'),
                Tables\Actions\Action::make('delete')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->action(fn (ImmunizationRecord $record) => $record->delete())
                    ->requiresConfirmation()
                    ->hidden(fn () => auth()->user()->role=='petugas_pendaftaran')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListImunizationRecords::route('/'),
            'create' => Pages\CreateImunizationRecord::route('/create'),
            'edit' => Pages\EditImunizationRecord::route('/{record}/edit'),
        ];
    }
}