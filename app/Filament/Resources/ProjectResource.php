<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationLabel = 'Portofolio Project';
    
    // Mantra anti error PHP 8.2+
public static function getNavigationIcon(): string
    {
        return 'heroicon-o-briefcase';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Nama Project / Baju')
                    ->required(),
                Forms\Components\TextInput::make('client')
                    ->label('Nama Klien / Perusahaan')
                    ->required(),
                Forms\Components\Select::make('category')
                    ->label('Kategori')
                    ->options([
                        'seragam' => 'Seragam Kerja',
                        'kaos' => 'Kaos & Polo',
                        'jaket' => 'Jaket & Hoodie',
                    ])
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->label('Foto Project')
                    ->image()
                    ->directory('projects')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('Foto'),
                Tables\Columns\TextColumn::make('title')->label('Project')->searchable(),
                Tables\Columns\TextColumn::make('client')->label('Klien'),
                Tables\Columns\TextColumn::make('category')->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'seragam' => 'info',
                        'kaos' => 'success',
                        'jaket' => 'warning',
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageProjects::route('/'),
        ];
    }
}