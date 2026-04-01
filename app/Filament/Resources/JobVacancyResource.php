<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobVacancyResource\Pages;
use App\Filament\Resources\JobVacancyResource\RelationManagers;
use App\Models\JobVacancy;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobVacancyResource extends Resource
{
    protected static ?string $model = JobVacancy::class;

    // Ganti ikon menu jadi tas kerja biar lebih pas buat rekrutmen
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    
    // Ganti nama menu di sidebar biar rapi
    protected static ?string $navigationLabel = 'Lowongan Kerja';
    protected static ?string $pluralModelLabel = 'Lowongan Kerja';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Lowongan')
                    ->description('Masukkan detail pekerjaan yang sedang dicari.')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Posisi / Judul Pekerjaan')
                            ->placeholder('Cth: Tukang Potong Kain')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\RichEditor::make('description')
                            ->label('Deskripsi Pekerjaan')
                            ->placeholder('Jelaskan tugas dan tanggung jawab...')
                            ->required()
                            ->columnSpanFull(),
                            
                        Forms\Components\RichEditor::make('requirements')
                            ->label('Syarat & Kualifikasi')
                            ->placeholder('Cth: Minimal pengalaman 2 tahun...')
                            ->columnSpanFull(),
                            
                        Forms\Components\TextInput::make('salary_range')
                            ->label('Kisaran Gaji (Opsional)')
                            ->placeholder('Cth: Rp 2.500.000 - Rp 4.000.000')
                            ->maxLength(255),
                            
                        Forms\Components\Toggle::make('is_active')
                            ->label('Status Loker Aktif?')
                            ->default(true)
                            ->helperText('Matikan jika lowongan sudah penuh.'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Posisi Pekerjaan')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                    
                Tables\Columns\TextColumn::make('salary_range')
                    ->label('Kisaran Gaji')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                    
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle'),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(), // Tambah tombol delete
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
            'index' => Pages\ListJobVacancies::route('/'),
            'create' => Pages\CreateJobVacancy::route('/create'),
            'edit' => Pages\EditJobVacancy::route('/{record}/edit'),
        ];
    }
}