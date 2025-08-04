<?php

namespace App\Filament\Admin\Resources\PerfilUnidadeResource\Pages;

use App\Filament\Admin\Resources\PerfilUnidadeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePerfilUnidade extends CreateRecord
{
    protected static string $resource = PerfilUnidadeResource::class;

        protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
