<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\RentalResource\Pages;
use App\Models\Rental;
use App\Models\Costumer;
use App\Models\Kostum;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;

class RentalResource extends Resource
{
    protected static ?string $model = Rental::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('costumer_id')
                ->relationship('costumer', 'nama')
                ->required()
                ->label('Pelanggan'),
            Forms\Components\Select::make('kostum_id')
                ->relationship('kostum', 'nama_kostum')
                ->required()
                ->label('Kostum'),
            Forms\Components\DatePicker::make('tanggal_pinjam')->required(),
            Forms\Components\DatePicker::make('tanggal_kembali')->required(),
            Forms\Components\Select::make('status')
                ->options(['pending' => 'Pending', 'selesai' => 'Selesai', 'telat' => 'Telat'])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('costumer.nama')->label('Pelanggan'),
            Tables\Columns\TextColumn::make('kostum.nama_kostum')->label('Kostum'),
            Tables\Columns\TextColumn::make('tanggal_pinjam')->date(),
            Tables\Columns\TextColumn::make('tanggal_kembali')->date(),
            Tables\Columns\TextColumn::make('status'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRentals::route('/'),
            'create' => Pages\CreateRental::route('/create'),
            'edit' => Pages\EditRental::route('/{record}/edit'),
        ];
    }
}
