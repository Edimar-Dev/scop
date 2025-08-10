<?php

namespace App\Filament\Admin\Resources\ServidorResource\Pages;

use App\Filament\Admin\Resources\ServidorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServidor extends EditRecord
{
    protected static string $resource = ServidorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
