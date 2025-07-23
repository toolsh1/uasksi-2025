<?php

namespace App\Filament\Admin\Resources\DendaResource\Pages;

use App\Filament\Admin\Resources\DendaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDenda extends EditRecord
{
    protected static string $resource = DendaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
