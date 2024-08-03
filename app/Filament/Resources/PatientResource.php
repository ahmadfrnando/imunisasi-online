<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Patient;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\SelectColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PatientResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PatientResource\RelationManagers;

class PatientResource extends Resource
{
    protected static ?string $model = Patient::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';
    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Pasien';

    public static function getPluralLabel(): ?string
    {
        $locale = app()->getLocale();
        if ($locale == 'id') {
            return "Daftar Pasien";
        } else
            return "Daftar Pasien";
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_balita')->autocomplete(false)->required(),
                DatePicker::make('tanggal_lahir'),
                Select::make('jenis_kelamin')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ])->required(),
                TextInput::make('tinggi_badan_lahir')->numeric()->suffix('cm')->required()->autocomplete(false),
                TextInput::make('berat_badan_lahir')->numeric()->suffix('kg')->required()->autocomplete(false),
                TextInput::make('lingkar_kepala')->numeric()->suffix('cm')->required()->autocomplete(false),
                Textarea::make('alamat')->required()->autocomplete(false),
                TextInput::make('nama_wali')->required()->autocomplete(false),
                TextInput::make('telepon_wali')->required()->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_balita')->label("hendra")->searchable()->searchable(),
                TextColumn::make('tanggal_lahir')->date(),
                TextColumn::make('jenis_kelamin')->searchable(),
                TextColumn::make('alamat')->limit(20)->searchable(),
                TextColumn::make('nama_wali')->searchable(),
                TextColumn::make('created_at')->label('Daftar Pada')->date(),
            ])->defaultSort('created_at', 'desc')
            ->filters([
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from')->label('Tanggal Mulai'),
                        DatePicker::make('created_until')->label('Tanggal Akhir')->default(now()),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
            ])
            ->actions([
                Tables\Actions\ViewAction::make('view'),
                Tables\Actions\EditAction::make()->color('third'),
                Tables\Actions\Action::make('delete')
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->action(fn (Patient $record) => $record->delete())
                ->requiresConfirmation(),
                Tables\Actions\Action::make('Laporan')
                    ->icon('heroicon-s-printer')
                    ->color('success')
                    ->url(
                        fn (Patient $record): string => route('laporan.perbalita', ['patient_id' => $record->patient_id]),
                        shouldOpenInNewTab: true
                    )
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
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'edit' => Pages\EditPatient::route('/{record}/edit'),
        ];
    }
}