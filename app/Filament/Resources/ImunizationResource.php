<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Immunization;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ImunizationResource\Pages;
use App\Filament\Resources\ImunizationResource\RelationManagers;

class ImunizationResource extends Resource
{
    protected static ?string $model = Immunization::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = 'Vaksin';

    public static function getPluralLabel(): ?string
    {
        $locale = app()->getLocale();
        if ($locale == 'id') {
            return "Daftar Vaksin";
        } else
            return "Daftar Vaksin";
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_vaksin')->autocomplete(false)->required(),
                TextInput::make('usia_tepat_terpenuhi')->autocomplete(false)->suffix('Bulan'),
                TextInput::make('usia_masih_dibolehkan')->autocomplete(false)->suffix('Bulan'),
                TextInput::make('usia_pemberian_imunisasi_kejar')->autocomplete(false)->suffix('Bulan'),
                TextInput::make('usia_tidak_dibolehkan')->autocomplete(false)->suffix('Bulan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_vaksin')->searchable(),
                TextColumn::make('usia_tepat_terpenuhi')
                ->suffix(' Bulan')
                ->badge()
                ->color('success')
                ->default('-')
                ->searchable(),
                TextColumn::make('usia_masih_dibolehkan')
                ->suffix(' Bulan')
                ->badge()
                ->color('warning')
                ->default('-')
                ->searchable(),
                TextColumn::make('usia_pemberian_imunisasi_kejar')
                ->suffix(' Bulan')
                ->badge()
                ->color('danger')
                ->default('-')
                ->searchable(),
                TextColumn::make('usia_tidak_dibolehkan')
                ->suffix(' Bulan')
                ->badge()
                ->color('gray')
                ->default('-')
                ->searchable(),
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
                ->action(fn (Immunization $record) => $record->delete())
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
            'index' => Pages\ListImunizations::route('/'),
            'create' => Pages\CreateImunization::route('/create'),
            'edit' => Pages\EditImunization::route('/{record}/edit'),
        ];
    }
}