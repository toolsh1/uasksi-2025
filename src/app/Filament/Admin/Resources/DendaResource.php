<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DendaResource\Pages;
use App\Models\Denda;
use App\Models\Rental;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;

class DendaResource extends Resource
{
    protected static ?string $model = Denda::class;
    protected static ?string $navigationIcon = 'heroicon-o-exclamation-circle';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('rental_id')
                ->relationship('rental', 'id')
                ->label('Rental')
                ->required(),
            Forms\Components\TextInput::make('jumlah_denda')
                ->numeric()
                ->required(),
            Forms\Components\Textarea::make('alasan')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('rental.id')->label('ID Rental'),
            Tables\Columns\TextColumn::make('jumlah_denda'),
            Tables\Columns\TextColumn::make('alasan'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDendas::route('/'),
            'create' => Pages\CreateDenda::route('/create'),
            'edit' => Pages\EditDenda::route('/{record}/edit'),
        ];
    }
}
