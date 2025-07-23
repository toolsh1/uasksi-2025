<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CostumerResource\Pages;
use App\Models\Costumer;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;

class CostumerResource extends Resource
{
    protected static ?string $model = Costumer::class;
    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama')->required(),
            Forms\Components\TextInput::make('email')->required()->email(),
            Forms\Components\TextInput::make('no_hp')->label('No. HP')->required(),
            Forms\Components\Textarea::make('alamat')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('nama')->searchable(),
            Tables\Columns\TextColumn::make('email'),
            Tables\Columns\TextColumn::make('no_hp')->label('No. HP'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCostumers::route('/'),
            'create' => Pages\CreateCostumer::route('/create'),
            'edit' => Pages\EditCostumer::route('/{record}/edit'),
        ];
    }
}
