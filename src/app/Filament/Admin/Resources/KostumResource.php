<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\KostumResource\Pages;
use App\Models\Kostum;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;

class KostumResource extends Resource
{
    protected static ?string $model = Kostum::class;
    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama_kostum')->required(),
            Forms\Components\Select::make('ukuran')->options(['S'=>'S','M'=>'M','L'=>'L','XL'=>'XL'])->required(),
            Forms\Components\TextInput::make('harga_sewa')->numeric()->required(),
            Forms\Components\TextInput::make('stok')->numeric()->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('nama_kostum'),
            Tables\Columns\TextColumn::make('ukuran'),
            Tables\Columns\TextColumn::make('harga_sewa'),
            Tables\Columns\TextColumn::make('stok'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKostums::route('/'),
            'create' => Pages\CreateKostum::route('/create'),
            'edit' => Pages\EditKostum::route('/{record}/edit'),
        ];
    }
}
