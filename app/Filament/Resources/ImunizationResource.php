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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_vaksin')->searchable(),
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
                ->action(fn (Immunization $record) => $record->delete())
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
            'index' => Pages\ListImunizations::route('/'),
            'create' => Pages\CreateImunization::route('/create'),
            'edit' => Pages\EditImunization::route('/{record}/edit'),
        ];
    }
}