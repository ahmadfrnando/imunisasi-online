<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Patient;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Measurement;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Date;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Actions\CreateAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MeasurementResource\Pages;
use App\Filament\Resources\MeasurementResource\RelationManagers;

class MeasurementResource extends Resource
{
    protected static ?string $model = Measurement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Penimbangan dan Pengukuran';

    public static function canViewAny(): bool
    {
        return auth()->user()->role!='petugas_pendaftaran';
    }

    public static function getPluralLabel(): ?string
    {
        $locale = app()->getLocale();
        if ($locale == 'id') {
            return "Daftar Penimbangan dan Pengukuran";
        } else
            return "Daftar Penimbangan dan Pengukuran";
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('patient_id')
                    ->label('Nama Balita')
                    ->options(Patient::all()->pluck('nama_balita', 'patient_id'))
                    ->searchable()->required(),
                DatePicker::make('tanggal')->label('Tanggal Pemeriksaan')->required(),
                TextInput::make('berat_badan')->label('Berat Badan')->numeric()->suffix('kg')->autocomplete(false)->required(),
                TextInput::make('tinggi_badan')->label('Tinggi Badan')->numeric()->suffix('cm')->autocomplete(false)->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('patient.nama_balita')->label('Nama Balita')->searchable(),
                TextColumn::make('tanggal')->label('Tanggal Pemeriksaan'),
                TextColumn::make('berat_badan')->label('Berat Badan')->suffix('kg'),
                TextColumn::make('tinggi_badan')->label('Tinggi Badan')->suffix('cm'),
                TextColumn::make('tanggal')->label('Dibuat Pada')->date(),
                TextColumn::make('petugas.name')->label('Dibuat Oleh')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make('view'),
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('delete')
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->action(fn (Measurement $record) => $record->delete())
                ->requiresConfirmation()
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
            'index' => Pages\ListMeasurements::route('/'),
            'create' => Pages\CreateMeasurement::route('/create'),
            'edit' => Pages\EditMeasurement::route('/{record}/edit'),
        ];
    }
}