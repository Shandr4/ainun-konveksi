<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LandingPageResource\Pages;
use App\Models\LandingPage;
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
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class LandingPageResource extends Resource
{
    protected static ?string $model = LandingPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';
    
    protected static ?string $navigationLabel = 'Landing Page';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // SECTION 1: HERO & TOPBAR
                Section::make('Header & Hero')
                    ->description('Pengaturan bagian paling atas dan Banner Utama')
                    ->collapsible()
                    ->schema([
                        TextInput::make('hero_title')
                            ->label('Judul Besar Hero')
                            ->placeholder('Contoh: UUN TJ KONVEKSI')
                            ->required(),
                        FileUpload::make('hero_image')
                            ->label('Gambar Background Hero')
                            ->image()
                            ->directory('landing-page')
                            ->helperText('Gunakan gambar landscape resolusi tinggi'),
                        TextInput::make('opening_hours')
                            ->label('Jam Operasional (Top Bar)')
                            ->placeholder('Mon-Fri: 9AM - 5PM'),
                    ])->columns(2),

                // SECTION 2: KATEGORI PRODUK (LINGKARAN)
                Section::make('Kategori Produk')
                    ->description('4 Lingkaran produk di bawah Hero')
                    ->collapsible()
                    ->schema([
                        Repeater::make('product_categories')
                            ->label('Daftar Kategori')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama Kategori')
                                    ->required(),
                                FileUpload::make('image')
                                    ->label('Foto Kategori')
                                    ->image()
                                    ->directory('products')
                                    ->required(),
                            ])
                            ->grid(2)
                            ->maxItems(4)
                            ->reorderable(true)
                    ]),

                // SECTION 3: TENTANG KAMI
                Section::make('Tentang Kami')
                    ->description('Detail informasi perusahaan')
                    ->collapsible()
                    ->schema([
                        Textarea::make('about_description')
                            ->label('Deskripsi Tentang Kami')
                            ->rows(5),
                        FileUpload::make('about_image')
                            ->label('Foto Workshop/Kantor')
                            ->image()
                            ->directory('about'),
                        Textarea::make('vision_mission_text')
                            ->label('Teks Visi & Misi')
                            ->rows(3),
                    ]),

                // SECTION 4: LAYANAN (CARD)
                Section::make('Layanan Kami')
                    ->description('Card layanan yang ada di bagian bawah')
                    ->collapsible()
                    ->schema([
                        Repeater::make('services')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Nama Layanan')
                                    ->required(),
                                Textarea::make('description')
                                    ->label('Penjelasan Singkat'),
                                FileUpload::make('image')
                                    ->label('Icon/Foto Layanan')
                                    ->image(),
                            ])
                            ->columns(2)
                    ]),

                // SECTION 5: CARA PEMESANAN
                Section::make('Cara Pemesanan Jasa')
                    ->description('Langkah-langkah pemesanan (01, 02, 03)')
                    ->collapsible()
                    ->schema([
                        Repeater::make('order_steps')
                            ->label('Langkah Pemesanan')
                            ->schema([
                                TextInput::make('number')->label('Nomor (Contoh: 01)')->required(),
                                TextInput::make('title')->label('Judul Step (Contoh: Konsultasi Kebutuhan)')->required(),
                            ])
                            ->columns(2)
                            ->maxItems(3)
                    ]),

                // SECTION 6: SOLUSI BERKUALITAS
                Section::make('Solusi Berkualitas')
                    ->description('Banner konten di atas bagian footer')
                    ->collapsible()
                    ->schema([
                        TextInput::make('solution_title')->label('Judul Solusi'),
                        Textarea::make('solution_description')->label('Teks Deskripsi Solusi')->rows(4),
                        FileUpload::make('solution_image')->label('Foto Mesin Jahit/Workshop')->image()->directory('solutions'),
                    ]),

                // 🔥 SECTION BARU: KONTAK UNTUK PEMESANAN (image_11.png) 🔥
                Section::make('Section Kontak (WhatsApp/Telpon)')
                    ->description('Form khusus untuk desain Konsultasi Mudah di bawah')
                    ->collapsible()
                    ->schema([
                        TextInput::make('contact_title')
                            ->label('Judul Besar Section')
                            ->placeholder('Contoh: Konsultasi Mudah Hubungi Kami Lewat')
                            ->required(),
                        TextInput::make('contact_subtitle')
                            ->label('Subjudul Section')
                            ->placeholder('Contoh: Anda bisa langsung hubungi kami lewat')
                            ->required(),
                        FileUpload::make('contact_image')
                            ->label('Gambar Utama Section (Workshop)')
                            ->image()
                            ->directory('contacts')
                            ->helperText('Gunakan gambar landscape resolusi tinggi'),

                        Repeater::make('contact_methods')
                            ->label('Daftar Card Kontak')
                            ->schema([
                                Select::make('type')
                                    ->label('Tipe Kontak')
                                    ->options([
                                        'whatsapp' => 'WhatsApp',
                                        'telephone' => 'Telpon',
                                    ])
                                    ->required(),
                                TextInput::make('title')
                                    ->label('Judul Card (Misal: Via WhatsApp)')
                                    ->required(),
                                TextInput::make('phone_number')
                                    ->label('Nomor Kontak')
                                    ->placeholder('(+123) 4567 7899')
                                    ->required(),
                                TextInput::make('business_hours')
                                    ->label('Hari & Jam Kerja')
                                    ->placeholder('Hari Kerja: 08:00 - 18:00')
                                    ->required(),
                            ])
                            ->grid(2) // Tampilin 2 card menyamping di admin
                            ->maxItems(2) // Mentok 2 step sesuai desain
                            ->reorderable(true)
                    ]),

                // SECTION 7: KONTAK & FOOTER (Lama)
                Section::make('Kontak untuk Footer & Top Bar')
                    ->description('Informasi yang muncul di Top Bar dan bagian paling bawah')
                    ->collapsible()
                    ->schema([
                        TextInput::make('phone')
                            ->label('Nomor WhatsApp/Telp (Footer)')
                            ->tel(),
                        TextInput::make('email')
                            ->label('Alamat Email (Footer)')
                            ->email(),
                        Textarea::make('address')
                            ->label('Alamat Lengkap (Footer)'),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('hero_title')
                    ->label('Judul Hero')
                    ->searchable(),
                ImageColumn::make('hero_image')
                    ->label('Banner'),
                TextColumn::make('updated_at')
                    ->label('Terakhir Diubah')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLandingPages::route('/'),
            'create' => Pages\CreateLandingPage::route('/create'),
            'edit' => Pages\EditLandingPage::route('/{record}/edit'),
        ];
    }
}