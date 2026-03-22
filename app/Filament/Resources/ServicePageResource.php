<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServicePageResource\Pages;
use App\Models\ServicePage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;

class ServicePageResource extends Resource
{
    protected static ?string $model = ServicePage::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    
    protected static ?string $navigationLabel = 'Halaman Layanan';
    
    protected static ?string $navigationGroup = 'Manajemen Halaman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Bagian Atas (Hero)')
                    ->schema([
                        TextInput::make('hero_title')->label('Judul Utama')->placeholder('Layanan Kami'),
                        TextInput::make('hero_subtitle')->label('Subjudul')->placeholder('Solusi produksi garmen terbaik...'),
                        FileUpload::make('hero_image')->label('Gambar Background')->image()->directory('service-page'),
                    ])->columns(1),

                Section::make('Daftar Layanan Lengkap')
                    ->schema([
                        Repeater::make('detailed_services')
                            ->label('List Layanan')
                            ->schema([
                                TextInput::make('title')->label('Nama Layanan')->required(),
                                Textarea::make('description')->label('Deskripsi Lengkap')->rows(3)->required(),
                                FileUpload::make('image')->label('Foto Layanan')->image()->directory('services-detail'),
                            ])
                            ->grid(2)
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hero_title')->label('Judul'),
                Tables\Columns\ImageColumn::make('hero_image')->label('Banner'),
                Tables\Columns\TextColumn::make('updated_at')->label('Terakhir Diubah')->dateTime(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServicePages::route('/'),
            'create' => Pages\CreateServicePage::route('/create'),
            'edit' => Pages\EditServicePage::route('/{record}/edit'),
        ];
    }
}