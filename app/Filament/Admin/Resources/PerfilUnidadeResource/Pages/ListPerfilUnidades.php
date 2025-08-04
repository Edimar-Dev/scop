<?php

namespace App\Filament\Admin\Resources\PerfilUnidadeResource\Pages;

use App\Filament\Admin\Resources\PerfilUnidadeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPerfilUnidades extends ListRecords
{
    protected static string $resource = PerfilUnidadeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
