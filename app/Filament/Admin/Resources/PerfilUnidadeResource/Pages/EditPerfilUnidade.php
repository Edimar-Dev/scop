<?php

namespace App\Filament\Admin\Resources\PerfilUnidadeResource\Pages;

use App\Filament\Admin\Resources\PerfilUnidadeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPerfilUnidade extends EditRecord
{
    protected static string $resource = PerfilUnidadeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

        protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
