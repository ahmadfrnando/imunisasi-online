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
use Carbon\Carbon;
use Filament\Tables\Filters\Filter;

class ImunizationRecordResource extends Resource
{
    protected static ?string $model = ImmunizationRecord::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationLabel = 'Imunisasi';



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
                // Select::make('patient_id')->label('Nama Balita')
                //     ->options(Patient::all()->pluck('nama_balita', 'patient_id'))
                //     ->searchable()->required(),
                Select::make('patient_id')
                ->label('Nama Balita')
                ->options(Patient::all()->pluck('nama_balita', 'patient_id'))
                ->searchable()
                ->required()
                ->reactive()
                ->afterStateUpdated(function (callable $set, $state) {
                    $patient = Patient::find($state);
                    if ($patient) {
                        $birthDate = Carbon::parse($patient->tanggal_lahir);
                        $now = Carbon::now();
                        $diff = $birthDate->diff($now);

                        $ageDisplay = $diff->m . ' bulan';
                        // if ($diff->d > 0) {
                        //     $ageDisplay .= ' ' . $diff->d . ' hari';
                        // }
                        $set('usia_saat_pemberian', $ageDisplay);
                    }
                }),
            TextInput::make('usia_saat_pemberian')
                ->required(),
                TextInput::make('berat_badan')->autocomplete(false)->suffix('kg')->required(),
                TextInput::make('tinggi_badan')->autocomplete(false)->suffix('cm')->required(),
                TextInput::make('lingkar_kepala')->autocomplete(false)->suffix('cm')->required(),
                Select::make('immunization_id')->label('Imunisasi')
                    ->options(Immunization::all()->pluck('nama_vaksin', 'immunization_id'))
                    ->searchable()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('patient.nama_balita')->label('Nama balita')->searchable(),
                TextColumn::make('immunization.nama_vaksin')->label('Jenis Vaksin')->searchable(),
                TextColumn::make('created_at')->label('Tanggal Pemberian')->date()->searchable(),
                TextColumn::make('usia_saat_pemberian')->label('Usia'),
                TextColumn::make('berat_badan')->suffix('kg')->searchable(),
                TextColumn::make('tinggi_badan')->suffix('cm')->searchable(),
                TextColumn::make('lingkar_kepala')->suffix('cm')->searchable(),
                TextColumn::make('petugas.name')->label('Petugas')->searchable(),
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('delete')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->action(fn (ImmunizationRecord $record) => $record->delete())
                    ->requiresConfirmation(),

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