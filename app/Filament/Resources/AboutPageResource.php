<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutPageResource\Pages;
use App\Models\AboutPage;
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
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class AboutPageResource extends Resource
{
    protected static ?string $model = AboutPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle'; // Icon Info (i)
    
    protected static ?string $navigationLabel = 'Halaman Tentang Kami'; // Nama menu di sidebar
    
    protected static ?string $navigationGroup = 'Manajemen Halaman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Hero & Perjalanan Kami')
                    ->schema([
                        TextInput::make('subtitle')
                            ->label('Subjudul Hero')
                            ->placeholder('Partner Terpercaya dalam Industri Garmen...'),
                        
                        FileUpload::make('image')
                            ->label('Foto Perjalanan Kami')
                            ->image()
                            ->directory('about-page'),
                            
                        TextInput::make('history_title')
                            ->label('Judul Sejarah')
                            ->placeholder('Perjalanan Kami'),
                            
                        Textarea::make('history_text')
                            ->label('Teks Cerita Sejarah')
                            ->rows(5),
                    ])->columns(1),

                Section::make('Visi, Misi & Nilai')
                    ->schema([
                        Textarea::make('vision')->label('Teks Visi (Card 1)')->rows(4),
                        Textarea::make('mission')->label('Teks Misi (Card 2)')->rows(4),
                        Textarea::make('values')->label('Teks Nilai Perusahaan (Card 3)')->rows(4),
                    ])->columns(3),

                Section::make('Keunggulan Kami')
                    ->schema([
                        Repeater::make('advantages')
                            ->label('4 Card Keunggulan di Bawah')
                            ->schema([
                                TextInput::make('title')->label('Judul Keunggulan')->required(),
                                Textarea::make('description')->label('Deskripsi Singkat')->required(),
                            ])
                            ->grid(2)
                            ->maxItems(4)
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('history_title')->label('Judul'),
                ImageColumn::make('image')->label('Foto'),
                TextColumn::make('updated_at')->label('Terakhir Diubah')->dateTime(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAboutPages::route('/'),
            'create' => Pages\CreateAboutPage::route('/create'),
            'edit' => Pages\EditAboutPage::route('/{record}/edit'),
        ];
    }
}