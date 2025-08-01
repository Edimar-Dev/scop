<?php

namespace App\Filament\Admin\Resources\UnidadeResource\Pages;

use App\Filament\Admin\Resources\UnidadeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUnidade extends EditRecord
{
    protected static string $resource = UnidadeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
