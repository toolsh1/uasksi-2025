<?php

namespace App\Filament\Admin\Resources\CostumerResource\Pages;

use App\Filament\Admin\Resources\CostumerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCostumer extends EditRecord
{
    protected static string $resource = CostumerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
