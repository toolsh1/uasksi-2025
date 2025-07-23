<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PembayaranResource\Pages;
use App\Models\Pembayaran;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;

class PembayaranResource extends Resource
{
    protected static ?string $model = Pembayaran::class;
    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('rental_id')
                ->relationship('rental', 'id')
                ->required(),
            Forms\Components\Select::make('metode')
                ->options(['cash' => 'Cash', 'transfer' => 'Transfer', 'qris' => 'QRIS'])
                ->required(),
            Forms\Components\TextInput::make('total_bayar')
                ->numeric()
                ->required(),
            Forms\Components\Select::make('status')
                ->options(['pending' => 'Pending', 'sukses' => 'Sukses', 'gagal' => 'Gagal'])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('rental.id')->label('ID Rental'),
            Tables\Columns\TextColumn::make('metode'),
            Tables\Columns\TextColumn::make('total_bayar'),
            Tables\Columns\TextColumn::make('status'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPembayarans::route('/'),
            'create' => Pages\CreatePembayaran::route('/create'),
            'edit' => Pages\EditPembayaran::route('/{record}/edit'),
        ];
    }
}
